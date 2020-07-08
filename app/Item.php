<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Laravelista\Comments\Commentable;
use Nicolaslopezj\Searchable\SearchableTrait;
use Codebyray\ReviewRateable\Contracts\ReviewRateable;
use Codebyray\ReviewRateable\Traits\ReviewRateable as ReviewRateableTrait;

class Item extends Model implements ReviewRateable
{
  use Commentable, SearchableTrait, ReviewRateableTrait;

  const ITEM_SUBMITTED = 1;
  const ITEM_PUBLISHED = 2;
  const ITEM_SUSPENDED = 3;

  const ITEM_FEATURED = 1;
  const ITEM_NOT_FEATURED = 0;

  const ITEM_FEATURED_BY_ADMIN = 1;
  const ITEM_NOT_FEATURED_BY_ADMIN = 0;

  const ITEM_ADDR_HIDE = 1;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'user_id',
    'category_id',
    'item_status',
    'item_featured',
    'item_title',
    'item_slug',
    'item_description',
    'item_image',
    'item_address',
    'item_address_hide',
    'city_id',
    'state_id',
    'country_id',
    'item_postal_code',
    'item_lat',
    'item_lng',
    'item_phone',
    'item_website',
    'item_social_facebook',
    'item_social_twitter',
    'item_social_linkedin',
    'item_features_string',
    'item_image_medium',
    'item_image_small',
    'item_image_tiny',
  ];

  /**
   * Searchable rules.
   *
   * @var array
   */
  protected $searchable = [
    /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
    'columns' => [
      'items.item_title' => 10,
      'categories.category_name' => 10,
      'items.item_description' => 9,
      'items.item_features_string' => 8,

    ],
    'joins' => [
      'categories' => ['items.category_id', 'categories.id'],
      //            'item_features' => ['items.id','item_features.item_id'],
    ],
  ];

  /**
   * Get the category that owns the item.
   */
  public function category()
  {
    return $this->belongsTo('App\Category');
  }

  /**
   * Get the user that owns the item.
   */
  public function user()
  {
    return $this->belongsTo('App\User');
  }

  /**
   * Get the gallery images for the item.
   */
  public function galleries()
  {
    return $this->hasMany('App\ItemImageGallery');
  }

  /**
   * Get the item features for the item.
   */
  public function features()
  {
    return $this->hasMany('App\ItemFeature')->orderBy('id');
  }

  /**
   * Get the item state that owns the item.
   */
  public function state()
  {
    return $this->belongsTo('App\State');
  }

  /**
   * Get the item city that owns the item.
   */
  public function city()
  {
    return $this->belongsTo('App\City');
  }

  /**
   * Get the item country that owns the item.
   */
  public function country()
  {
    return $this->belongsTo('App\Country');
  }

  /**
   * Get the thread_item_rels table records for the item.
   */
  public function threadItems()
  {
    return $this->hasMany('App\ThreadItem');
  }

  /**
   * Get all of the post's comments.
   */
  public function totalComments()
  {
    return DB::table('comments')
      ->where('commentable_type', 'App\Item')
      ->where('approved', 1)
      ->where('commentable_id', $this->id)
      ->count();
  }

  /**
   * Get all of users who saved this item
   */
  public function savedByUsers()
  {
    return $this->belongsToMany('App\User')->withTimestamps();
  }
}
