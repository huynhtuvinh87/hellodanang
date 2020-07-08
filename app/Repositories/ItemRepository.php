<?php

namespace App\Repositories;

use App\Item;
use App\Category;
use App\User;
use App\Setting;
use App\Contracts\ItemInterface;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use DateTime;

class ItemRepository implements ItemInterface
{

  protected $_item;
  protected $_user;
  protected $_category;
  protected $_setting;


  public function __construct()
  {
    $this->_item = new Item();
    $this->_user = new User();
    $this->_setting = \Constant::setting();
  }

  public function getItemTotal()
  {
    try {
      return $this->_item->join('users as u', 'items.user_id', '=', 'u.id')
        ->where('items.item_status', Item::ITEM_PUBLISHED)
        ->where('items.country_id', $this->_setting->setting_site_location_country_id)
        ->where('u.email_verified_at', '!=', null)
        ->where('u.user_suspended', User::USER_NOT_SUSPENDED)
        ->get()->count();
    } catch (Exception $e) {
      throw $e;
    }
  }

  public function getItemFeatured()
  {
    try {
      $setting = $this->_setting;
      $today = new DateTime('now');
      $today = $today->format("Y-m-d");
      $paid_items_query = $this->_item->query();
      $paid_items_query->join('users as u', 'items.user_id', '=', 'u.id')
        ->join('subscriptions as s', 'u.id', '=', 's.user_id')
        ->leftjoin('cities as c', 'items.city_id', '=', 'c.id')
        ->leftjoin('categories as cat', 'items.category_id', '=', 'cat.id')
        ->select('items.*', 'c.city_name', 'c.city_slug', 'cat.category_name', 'cat.category_slug', 'u.name as fullname', 'u.user_image')
        ->where(function ($query) use ($setting) {
          $query->where("items.item_status", Item::ITEM_PUBLISHED)
            ->where('items.item_featured', Item::ITEM_FEATURED)
            ->where('items.country_id', $setting->setting_site_location_country_id)
            ->where('u.email_verified_at', '!=', null)
            ->where('u.user_suspended', User::USER_NOT_SUSPENDED);
        })
        ->where(function ($query) use ($today) {
          $query->where(function ($sub_query) use ($today) {
            $sub_query->where('s.subscription_end_date', '!=', null)
              ->where('s.subscription_end_date', '>=', $today);
          })
            ->orWhere(function ($sub_query) use ($today) {
              $sub_query->where('items.item_featured_by_admin', Item::ITEM_FEATURED_BY_ADMIN);
            });
        })
        ->orderBy('items.created_at', 'DESC');
      return $paid_items_query->take(20)->get();
    } catch (Exception $e) {
      throw $e;
    }
  }

  public function getItemLatest()
  {
    try {
      return $this->_item->latest('created_at')
        ->where('country_id', $this->_setting->setting_site_location_country_id)
        ->leftjoin('cities as c', 'items.city_id', '=', 'c.id')
        ->leftjoin('users as u', 'items.user_id', '=', 'u.id')
        ->leftjoin('categories as cat', 'items.category_id', '=', 'cat.id')
        ->select('items.*', 'c.city_name', 'c.city_slug', 'u.name as fullname', 'u.user_image', 'cat.category_name', 'cat.category_slug')
        ->take(20)
        ->get();
    } catch (Exception $e) {
      throw $e;
    }
  }

  public function getItemPopular()
  {
    try {
      if (!empty(session('user_device_location_lat', '')) && !empty(session('user_device_location_lng', ''))) {
        $latitude = session('user_device_location_lat', '');
        $longitude = session('user_device_location_lng', '');
      } else {
        $latitude = $this->_setting->setting_site_location_lat;
        $longitude = $this->_setting->setting_site_location_lng;
      }

      $popular_items = $this->_item->selectRaw('items.*, u.name as fullname, u.user_image, ( 6367 * acos( cos( radians( ? ) ) * cos( radians( items.item_lat ) ) * cos( radians( items.item_lng ) - radians( ? ) ) + sin( radians( ? ) ) * sin( radians( items.item_lat ) ) ) ) AS distance, c.city_name, c.city_slug, cat.category_name, cat.category_slug', [$latitude, $longitude, $latitude])
        ->leftjoin('cities as c', 'items.city_id', '=', 'c.id')
        ->leftjoin('users as u', 'items.user_id', '=', 'u.id')
        ->leftjoin('categories as cat', 'items.category_id', '=', 'cat.id')
        ->where('items.country_id', $this->_setting->setting_site_location_country_id)
        ->having('distance', '<', 5000)
        ->orderBy('distance')
        ->orderBy('items.created_at', 'DESC')
        ->take(15)->get();

      // if no items nearby, then use the default lat & lng
      if ($popular_items->count() == 0) {
        $latitude = $this->_setting->setting_site_location_lat;
        $longitude = $this->_setting->setting_site_location_lng;

        $popular_items = $this->_item->selectRaw('items.*, u.name as fullname, u.user_image, ( 6367 * acos( cos( radians( ? ) ) * cos( radians( items.item_lat ) ) * cos( radians( items.item_lng ) - radians( ? ) ) + sin( radians( ? ) ) * sin( radians( items.item_lat ) ) ) ) AS distance, c.city_name, c.city_slug, cat.category_name, cat.category_slug', [$latitude, $longitude, $latitude])
          ->leftjoin('cities as c', 'items.city_id', '=', 'c.id')
          ->leftjoin('users as u', 'items.user_id', '=', 'u.id')
          ->leftjoin('categories as cat', 'items.category_id', '=', 'cat.id')
          ->where('items.country_id', $this->_setting->setting_site_location_country_id)
          ->having('distance', '<', 5000)
          ->orderBy('distance')
          ->orderBy('items.created_at', 'DESC')
          ->take(15)->get();
      }
      return $popular_items;
    } catch (Exception $e) {
      throw $e;
    }
  }

  public function getNearby($item)
  {
    try {
      $latitude = $item->item_lat;
      $longitude = $item->item_lng;
      return $this->_item->selectRaw('*, u.name as fullname, u.user_image, c.city_name, c.city_slug, cat.category_name, cat.category_slug, ( 6367 * acos( cos( radians( ? ) ) * cos( radians( item_lat ) ) * cos( radians( item_lng ) - radians( ? ) ) + sin( radians( ? ) ) * sin( radians( item_lat ) ) ) ) AS distance', [$latitude, $longitude, $latitude])
        ->where('items.id', '!=', $item->id)
        ->leftjoin('cities as c', 'items.city_id', '=', 'c.id')
        ->leftjoin('users as u', 'items.user_id', '=', 'u.id')
        ->leftjoin('categories as cat', 'items.category_id', '=', 'cat.id')
        ->where('items.country_id', $this->_setting->setting_site_location_country_id)
        ->having('distance', '<', 500)
        ->orderBy('distance')
        ->orderBy('items.created_at', 'DESC')
        ->take(6)->get();
    } catch (Exception $e) {
      throw $e;
    }
  }

  public function getSimilar($item)
  {
    try {
      $latitude = $item->item_lat;
      $longitude = $item->item_lng;
      return $this->_item->selectRaw('*, u.name as fullname, u.user_image, c.city_name, c.city_slug, cat.category_name, cat.category_slug,  ( 6367 * acos( cos( radians( ? ) ) * cos( radians( item_lat ) ) * cos( radians( item_lng ) - radians( ? ) ) + sin( radians( ? ) ) * sin( radians( item_lat ) ) ) ) AS distance', [$latitude, $longitude, $latitude])
        ->leftjoin('cities as c', 'items.city_id', '=', 'c.id')
        ->leftjoin('users as u', 'items.user_id', '=', 'u.id')
        ->leftjoin('categories as cat', 'items.category_id', '=', 'cat.id')
        ->where('items.id', '!=', $item->id)
        ->where('items.category_id', $item->category_id)
        ->where('items.state_id', $item->state_id)
        ->where('items.country_id', $this->_setting->setting_site_location_country_id)
        ->having('distance', '<', 500)
        ->orderBy('distance')
        ->orderBy('items.created_at', 'DESC')
        ->take(6)->get();
    } catch (Exception $e) {
      throw $e;
    }
  }

  public function find($id)
  {
    try {
      return $this->_item->where('items.id', $id)
        ->where('items.country_id', $this->_setting->setting_site_location_country_id)
        ->where('items.item_status', Item::ITEM_PUBLISHED)
        ->leftjoin('cities as c', 'items.city_id', '=', 'c.id')
        ->leftjoin('users as u', 'items.user_id', '=', 'u.id')
        ->leftjoin('categories as cat', 'items.category_id', '=', 'cat.id')
        ->select('items.*', 'c.city_name', 'c.city_slug', 'u.name as fullname', 'u.user_image', 'cat.category_name', 'cat.category_slug')
        ->first();
    } catch (Exception $e) {
      throw $e;
    }
  }

  /**
   * Get list article
   * @param $limit
   * @author huynhtuvinh87@gmail.com
   */
  public function search($request)
  {
    try {

      $query = $this->_post->select(
        'posts.id',
        'posts.title',
        'posts.slug',
        'posts.description',
        'posts.content',
        'posts.image',
        'posts.images',
        'posts.price',
        'posts.price_sale',
        'posts.meta_keyword',
        'posts.meta_description',
        'posts.status',
        'users.username',
        'makers.name as maker_name',
        'makers.id as maker_id',
        'makers.slug as maker_slug'
      )->leftjoin('users', function ($q) {
        $q->on('posts.user_id', 'users.id');
      })->leftjoin('makers', function ($q) {
        $q->on('posts.maker_id', 'makers.id');
      })->where('posts.type', config('global.post_type.article'))->where('posts.status', '!=', config('global.status.trash'));

      if ($request->category) {
        $query->rightjoin('post_categories', function ($q) {
          $q->on('posts.id', 'post_categories.post_id');
        })->where('post_categories.category_id', $request->category);
      }
      if ($request->keywords) {
        $query->where(function ($q) use ($request) {
          $q->where('posts.title', 'LIKE', '%' . $request->keywords . '%')
            ->orWhere('posts.slug', 'LIKE', '%' . $request->keywords . '%')
            ->orWhere('posts.meta_keyword', 'LIKE', '%' . $request->keywords . '%')
            ->orWhere('posts.meta_description', 'LIKE', '%' . $request->keywords . '%');
        });
      }
      if ($request->from_price) {
        $query = $query->where('posts.price', '>', $request->from_price);
      }
      if ($request->to_price) {
        $query = $query->where('posts.price', '<', $request->to_price);
      }
      if ($request->maker) {
        $query = $query->where('posts.maker_id', $request->maker);
      }
      return $query->orderBy('posts.id', 'desc')->paginate($request->limit);
    } catch (Exception $e) {
      throw $e;
    }
  }
}
