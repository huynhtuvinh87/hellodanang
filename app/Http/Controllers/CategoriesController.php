<?php

namespace App\Http\Controllers;

use App\Category;
use App\Country;
use App\Item;
use App\Setting;
use App\State;
use App\User;
use Illuminate\Support\Facades\URL;
use DateTime;
use App\Repositories\CategoryRepository;
use App\Repositories\ItemRepository;
use Artesaos\SEOTools\Facades\SEOMeta;

class CategoriesController extends Controller
{

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct(CategoryRepository $categoryRepository, ItemRepository $itemRepository)
  {
    $this->_categoryRepository = $categoryRepository;
    $this->_itemRepository = $itemRepository;
    $this->_setting = \Constant::setting();
  }

  private function getStatesCitiesJson()
  {
    $country = Country::find($this->_setting->setting_site_location_country_id);
    $states = $country->states()->get();

    $states_json_str = array();
    $cities_json_str = array();
    foreach ($states as $key => $state) {
      $states_json_str[] = $state->state_name;

      $cities = $state->cities()->select('city_name')->orderBy('city_name')->get();
      foreach ($cities as $city) {
        $cities_json_str[] = $city->city_name . ', ' . $state->state_name;
      }
    }

    $states_cities_array = array();
    $states_cities_array['states'] = $states_json_str;
    $states_cities_array['cities'] = $cities_json_str;

    return $states_cities_array;
  }


  public function index()
  {
    /**
     * Start SEO
     */
    $settings = $this->setting;
    //SEOMeta::setTitle('All Categories - ' . (empty($settings->setting_site_name) ? config('app.name', 'Laravel') : $settings->setting_site_name));
    SEOMeta::setTitle(__('seo.frontend.categories', ['site_name' => empty($settings->setting_site_name) ? config('app.name', 'Laravel') : $settings->setting_site_name]));
    SEOMeta::setDescription('');
    SEOMeta::setCanonical(URL::current());
    SEOMeta::addKeyword($settings->setting_site_seo_home_keywords);
    /**
     * End SEO
     */

    $categories = Category::withCount(['items' => function ($query) use ($settings) {
      $query->where('country_id', $settings->setting_site_location_country_id)
        ->where('item_status', Item::ITEM_PUBLISHED);
    }])->get();

    /**
     * Do listing query
     * 1. get paid listings and free listings.
     * 2. decide how many paid and free listings per page and total pages.
     * 3. decide the pagination to paid or free listings
     * 4. run query and render
     */
    $today = new DateTime('now');
    $today = $today->format("Y-m-d");

    // paid listing
    $paid_items_query = Item::query();
    $paid_items_query->join('users as u', 'items.user_id', '=', 'u.id')
      ->join('subscriptions as s', 'u.id', '=', 's.user_id')
      ->select('items.*')
      ->where(function ($query) use ($settings) {
        $query->where("items.item_status", Item::ITEM_PUBLISHED)
          ->where('items.item_featured', Item::ITEM_FEATURED)
          ->where('items.country_id', $settings->setting_site_location_country_id)
          ->where('u.email_verified_at', '!=', null)
          ->where('u.user_suspended', User::USER_NOT_SUSPENDED);
      })
      ->where(function ($query) use ($today) {
        $query->where(function ($sub_query) use ($today) {
          $sub_query->where('s.subscription_end_date', '!=', null)
            ->where('s.subscription_end_date', '>=', $today);
        })
          ->orWhere(function ($sub_query) use ($today) {
            //                        $sub_query->where('s.subscription_end_date', null)
            $sub_query->where('items.item_featured_by_admin', Item::ITEM_FEATURED_BY_ADMIN);
          });
      })
      ->orderBy('items.created_at', 'ASC');
    $total_paid_items = $paid_items_query->count();

    // free listing
    $free_items_query = Item::query();
    $free_items_query->join('users as u', 'items.user_id', '=', 'u.id')
      ->join('subscriptions as s', 'u.id', '=', 's.user_id')
      ->select('items.*')
      ->where(function ($query) use ($settings) {
        $query->where("items.item_status", Item::ITEM_PUBLISHED)
          ->where('items.country_id', $settings->setting_site_location_country_id)
          ->where('u.email_verified_at', '!=', null)
          ->where('u.user_suspended', User::USER_NOT_SUSPENDED);
      })
      ->where(function ($query) use ($today) {
        $query->where(function ($sub_query) use ($today) {
          $sub_query->where('items.item_featured', Item::ITEM_NOT_FEATURED);
        })
          ->orWhere(function ($sub_query) use ($today) {
            $sub_query->where('items.item_featured', Item::ITEM_FEATURED)
              ->where('s.subscription_end_date', '!=', null)
              ->where('s.subscription_end_date', '<=', $today);
          });
      })
      ->orderBy('items.created_at', 'DESC');
    $total_free_items = $free_items_query->count();

    if ($total_free_items == 0 || $total_paid_items == 0) {
      $paid_items = $paid_items_query->paginate(10);
      $free_items = $free_items_query->paginate(10);

      if ($total_free_items == 0) {
        $pagination = $paid_items;
      }
      if ($total_paid_items == 0) {
        $pagination = $free_items;
      }
    } else {
      $num_of_pages = ceil(($total_paid_items + $total_free_items) / 10);
      $paid_items_per_page = ceil($total_paid_items / $num_of_pages) < 4 ? 4 : ceil($total_paid_items / $num_of_pages);
      $free_items_per_page = 10 - $paid_items_per_page;

      $paid_items = $paid_items_query->paginate($paid_items_per_page);
      $free_items = $free_items_query->paginate($free_items_per_page);

      if (ceil($total_paid_items / $paid_items_per_page) > ceil($total_free_items / $free_items_per_page)) {
        $pagination = $paid_items;
      } else {
        $pagination = $free_items;
      }
    }
    /**
     * End do listing query
     */

    $all_states = Country::find($settings->setting_site_location_country_id)
      ->states()
      ->withCount(['items' => function ($query) use ($settings) {
        $query->where('country_id', $settings->setting_site_location_country_id);
      }])
      ->orderBy('state_name')->get();


    /**
     * initial search bar
     */
    $search_all_categories = Category::all();
    $states_cities_array = $this->getStatesCitiesJson();
    $search_states_json = json_encode($states_cities_array['states']);
    $search_cities_json = json_encode($states_cities_array['cities']);

    return response()->view(
      'frontend.categories',
      compact(
        'categories',
        'paid_items',
        'free_items',
        'pagination',
        'all_states',
        'search_all_categories',
        'search_states_json',
        'search_cities_json'
      )
    );
  }

  public function category(string $category_slug)
  {
    $category = Category::where('category_slug', $category_slug)->first();

    if ($category) {
      /**
       * Start SEO
       */
      $settings = Setting::find(1);
      SEOMeta::setTitle($category->category_name . ' - ' . (empty($settings->setting_site_name) ? config('app.name', 'Laravel') : $settings->setting_site_name));
      SEOMeta::setDescription('');
      SEOMeta::setCanonical(URL::current());
      SEOMeta::addKeyword($settings->setting_site_seo_home_keywords);
      /**
       * End SEO
       */

      /**
       * Do listing query
       * 1. get paid listings and free listings.
       * 2. decide how many paid and free listings per page and total pages.
       * 3. decide the pagination to paid or free listings
       * 4. run query and render
       */
      $today = new DateTime('now');
      $today = $today->format("Y-m-d");

      // paid listing
      $paid_items_query = Item::query();
      $paid_items_query->join('users as u', 'items.user_id', '=', 'u.id')
        ->join('subscriptions as s', 'u.id', '=', 's.user_id')
        ->select('items.*')
        ->where(function ($query) use ($category, $settings) {
          $query->where("items.category_id", $category->id)
            ->where("items.item_status", Item::ITEM_PUBLISHED)
            ->where('items.item_featured', Item::ITEM_FEATURED)
            ->where('items.country_id', $settings->setting_site_location_country_id)
            ->where('u.email_verified_at', '!=', null)
            ->where('u.user_suspended', User::USER_NOT_SUSPENDED);
        })
        ->where(function ($query) use ($today) {
          $query->where(function ($sub_query) use ($today) {
            $sub_query->where('s.subscription_end_date', '!=', null)
              ->where('s.subscription_end_date', '>=', $today);
          })
            ->orWhere(function ($sub_query) use ($today) {
              //                        $sub_query->where('s.subscription_end_date', null)
              $sub_query->where('items.item_featured_by_admin', Item::ITEM_FEATURED_BY_ADMIN);
            });
        })
        ->orderBy('items.created_at', 'ASC');
      $total_paid_items = $paid_items_query->count();

      // free listing
      $free_items_query = Item::query();
      $free_items_query->join('users as u', 'items.user_id', '=', 'u.id')
        ->join('subscriptions as s', 'u.id', '=', 's.user_id')
        ->select('items.*')
        ->where(function ($query) use ($category, $settings) {
          $query->where("items.category_id", $category->id)
            ->where("items.item_status", Item::ITEM_PUBLISHED)
            ->where('items.country_id', $settings->setting_site_location_country_id)
            ->where('u.email_verified_at', '!=', null)
            ->where('u.user_suspended', User::USER_NOT_SUSPENDED);
        })
        ->where(function ($query) use ($today) {
          $query->where(function ($sub_query) use ($today) {
            $sub_query->where('items.item_featured', Item::ITEM_NOT_FEATURED);
          })
            ->orWhere(function ($sub_query) use ($today) {
              $sub_query->where('items.item_featured', Item::ITEM_FEATURED)
                ->where('s.subscription_end_date', '!=', null)
                ->where('s.subscription_end_date', '<=', $today);
            });
        })
        ->orderBy('items.created_at', 'DESC');
      $total_free_items = $free_items_query->count();

      if ($total_free_items == 0 || $total_paid_items == 0) {
        $paid_items = $paid_items_query->paginate(10);
        $free_items = $free_items_query->paginate(10);

        if ($total_free_items == 0) {
          $pagination = $paid_items;
        }
        if ($total_paid_items == 0) {
          $pagination = $free_items;
        }
      } else {
        $num_of_pages = ceil(($total_paid_items + $total_free_items) / 10);
        $paid_items_per_page = ceil($total_paid_items / $num_of_pages) < 4 ? 4 : ceil($total_paid_items / $num_of_pages);
        $free_items_per_page = 10 - $paid_items_per_page;

        $paid_items = $paid_items_query->paginate($paid_items_per_page);
        $free_items = $free_items_query->paginate($free_items_per_page);

        if (ceil($total_paid_items / $paid_items_per_page) > ceil($total_free_items / $free_items_per_page)) {
          $pagination = $paid_items;
        } else {
          $pagination = $free_items;
        }
      }
      /**
       * End do listing query
       */

      $all_states = State::whereHas('items', function ($query) use ($category, $settings) {
        $query->where('category_id', $category->id)
          ->where('country_id', $settings->setting_site_location_country_id);
      }, '>', 0)->orderBy('state_name')->get();

      /**
       * initial search bar
       */
      $search_all_categories = Category::all();
      $states_cities_array = $this->getStatesCitiesJson();
      $search_states_json = json_encode($states_cities_array['states']);
      $search_cities_json = json_encode($states_cities_array['cities']);

      return response()->view(
        'frontend.category',
        compact(
          'category',
          'paid_items',
          'free_items',
          'pagination',
          'all_states',
          'search_all_categories',
          'search_states_json',
          'search_cities_json'
        )
      );
    } else {
      abort(404);
    }
  }
}
