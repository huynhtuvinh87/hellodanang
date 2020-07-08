<?php

namespace App\Repositories;

use App\Category;
use App\User;
use App\Setting;
use App\Item;
use App\Contracts\CategoryInterface;
use Exception;
use Illuminate\Support\Str;
use Storage;

class CategoryRepository implements CategoryInterface
{

  protected $_category;
  protected $_user;
  protected $_setting;

  public function __construct()
  {
    $this->_setting = Setting::find(1);
    $this->_category = new Category();
    $this->_user = new User();
  }
  /**
   * Get list
   * @author huynhtuvinh87@gmail.com
   */
  public function get()
  {
    try {
      $settings = $this->_setting;
      $categories = $this->_category->withCount(['items' => function ($query) use ($settings) {
        $query->where('country_id', $settings->setting_site_location_country_id)
          ->where('item_status', Item::ITEM_PUBLISHED);
      }])
        ->orderBy('items_count', 'DESC')->take(5)->get();

      return $categories;
    } catch (Exception $e) {
      throw $e;
    }
  }


  /**
   * Create
   * @param $request
   * @author huynhtuvinh87@gmail.com
   */
  public function create($request)
  {
    try {
      if ($this->level($request->parent_id) == 4) {
        return 'Sub category should not exceed 3 levels.';
      }
      $result = $this->_category->create([
        'parent_id' => $request->parent_id,
        'level' => $this->level($request->parent_id),
        'title' => $request->title,
        'slug' => Str::slug($request->title, '-'),
        'description' => $request->description,
        'image' => $request->image,
        'status' => config('global.status.active')
      ]);
      $this->storage();
      return $result;
    } catch (Exception $e) {
      throw $e;
    }
  }


  /**
   * Update
   * @param $request
   *
   * @author huynhtuvinh87@gmail.com
   */
  public function update($id, $request)
  {
    try {

      if ($this->level($request->parent_id) == 4) {
        return 'Sub category should not exceed 3 levels.';
      }
      $result = $this->_category->where('id', $id)->update([
        'parent_id' => $request->parent_id,
        'level' => $this->level($request->parent_id),
        'title' => $request->title,
        'slug' => Str::slug($request->title, '-'),
        'description' => $request->description,
        'image' => $request->image,
      ]);
      $this->storage();
      return $this->_category->where('id', $id)->first();
    } catch (Exception $e) {
      throw $e;
    }
  }

  /**
   * Trash
   * @param $id
   *
   * @author huynhtuvinh87@gmail.com
   */
  public function trash($id)
  {
    try {
      $result = $this->_category->where('id', $id)->update([
        'status' => config('global.status.trash')
      ]);
      $this->_category->where('parent_id', $id)->update([
        'parent_id' => null
      ]);
      return $result;
    } catch (Exception $e) {
      throw $e;
    }
  }

  /**
   * Delete
   * @param string id
   *
   * @author huynhtuvinh87@gmail.com
   */
  public function delete($id)
  {
    try {
      $result = $this->_category->where('id', $id)->delete();
      return $result;
    } catch (Exception $e) {
      throw $e;
    }
  }

  /**
   * Get first category
   * @param $id
   * @author huynhtuvinh87@gmail.com
   */
  public function level($id)
  {
    try {
      if (is_int($id)) {
        $query = $this->_category->select('level')->where('id', $id)->first();
        return $query->level + 1;
      } else {
        return 1;
      }
    } catch (Exception $e) {
      throw $e;
    }
  }

  /**
   * Get find category
   * @param $id
   * @author huynhtuvinh87@gmail.com
   */
  public function find($id)
  {
    try {
      $query = $this->_category->select('*')->where('id', $id)->first();
      return $query;
    } catch (Exception $e) {
      throw $e;
    }
  }

  /**
   * Get find category by slug
   * @param $id
   * @author huynhtuvinh87@gmail.com
   */
  public function findBySlug($slug)
  {
    try {
      $query = $this->_category->select('*')->where('slug', $slug)->first();
      return $query;
    } catch (Exception $e) {
      throw $e;
    }
  }
  public function getPostInCategory($category_id, $limit)
  {
    $category = $this->_postCategory->select('post_id')->whereIn('category_id', $category_id)->limit($limit)->get()->toArray();
    return $category;
  }

  public function storage()
  {
    try {
      $categories = $this->_category->select('id', 'slug', 'title')->where('status', '!=', config('global.status.trash'))->get();
      $data = [];
      foreach ($categories as $value) {
        $data[$value->id] = ['id' => $value->id, 'title' => $value->title, 'slug' => $value->slug, 'posts' => $value->post_limit->toArray()];
      }
      Storage::disk('local')->put('public/category.json', json_encode($data));
    } catch (Exception $e) {
      throw $e;
    }
  }
}
