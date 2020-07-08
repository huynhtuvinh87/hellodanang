<?php

namespace App\Http\Controllers;

use App\BlogPost;
use App\Category;
use App\City;
use App\Country;
use App\Faq;
use App\Item;
use App\ItemImageGallery;
use App\Mail\Notification;
use App\Setting;
use App\State;
use App\Testimonial;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use DateTime;
use App\Repositories\CategoryRepository;
use App\Repositories\ItemRepository;
use Artesaos\SEOTools\Facades\SEOMeta;

class PagesController extends Controller
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
  }

  public function index(Request $request)
  {
    /**
     * Start SEO
     */
    $settings = \Constant::setting();
    SEOMeta::setTitle($settings->setting_site_seo_home_title . ' - ' . (empty($settings->setting_site_name) ? config('app.name', 'Laravel') : $settings->setting_site_name));
    SEOMeta::setDescription($settings->setting_site_seo_home_description);
    SEOMeta::setCanonical(URL::current());
    SEOMeta::addKeyword($settings->setting_site_seo_home_keywords);
    /**
     * End SEO
     */

    /**
     * first 5 categories order by total listings
     */
    $categories = $this->_categoryRepository->get();

    $total_items_count = $this->_itemRepository->getItemTotal();

    // paid listing

    $paid_items = $this->_itemRepository->getItemFeatured();

    $popular_items = $this->_itemRepository->getItemPopular();

    /**
     * get first 20 latest items
     */
    $latest_items = $this->_itemRepository->getItemLatest();

    /**
     * testimonials
     */
    $all_testimonials = Testimonial::latest('created_at')->get();

    /**
     * get latest 3 blog posts
     */
    $recent_blog = \Canvas\Post::published()->orderByDesc('published_at')->take(3)->get();

    /**
     * initial the search type head
     */
    $search_all_categories = Category::all();

    return response()->view(
      'frontend.index',
      compact(
        'categories',
        'total_items_count',
        'paid_items',
        'popular_items',
        'latest_items',
        'all_testimonials',
        'recent_blog',
        'search_all_categories'
      )
    );
  }

  private function getStatesCitiesJson()
  {
    $country = Country::find(Setting::find(1)->setting_site_location_country_id);
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

  public function search()
  {
    /**
     * Start SEO
     */
    $settings = Setting::find(1);
    //SEOMeta::setTitle('Search Listings - ' . (empty($settings->setting_site_name) ? config('app.name', 'Laravel') : $settings->setting_site_name));
    SEOMeta::setTitle(__('seo.frontend.search', ['site_name' => empty($settings->setting_site_name) ? config('app.name', 'Laravel') : $settings->setting_site_name]));
    SEOMeta::setDescription('');
    SEOMeta::setCanonical(URL::current());
    SEOMeta::addKeyword($settings->setting_site_seo_home_keywords);
    /**
     * End SEO
     */

    $search_all_categories = Category::all();
    $states_cities_array = $this->getStatesCitiesJson();
    $search_states_json = json_encode($states_cities_array['states']);
    $search_cities_json = json_encode($states_cities_array['cities']);

    return response()->view(
      'frontend.search',
      compact('search_all_categories', 'search_cities_json', 'search_states_json')
    );
  }

  public function doSearch(Request $request)
  {
    $request->validate([
      'search_query' => 'required|max:255',
      'categories' => 'required|numeric',
    ]);

    $last_search_query = $request->search_query;
    $last_search_category = $request->categories;
    $last_search_city_state = $request->city_state;

    //        session(['last_search_query' => $last_search_query]);
    //        session(['last_search_city_state' => $last_search_city_state]);
    //        session(['last_search_category' => $last_search_category]);

    $query = $last_search_query;
    $category = $last_search_category;
    $city_state = explode(',', $last_search_city_state);

    $city = '';
    $state = '';
    if (count($city_state) == 2) {
      $city = trim($city_state[0]);
      $state = trim($city_state[1]);
    } else {
      $state = $city_state;
    }

    //$country = Country::where('country_abbr', 'US')->first();
    $country = Country::find(Setting::find(1)->setting_site_location_country_id);
    $state_obj = $country->states()->where('state_name', $state)->first();

    if ($state_obj) {
      if (!empty($city)) {
        $city_obj = $state_obj->cities()->where('city_name', $city)->first();

        if ($category != 0) {
          // Search with lower relevance threshold
          $items = Item::search($query, null, true)
            ->where('category_id', $category)
            ->where('state_id', $state_obj->id)
            ->where('city_id', $city_obj->id)
            ->where('item_status', Item::ITEM_PUBLISHED)
            ->with('category')
            ->with('features')
            ->paginate(10);
        } else {
          // Search with lower relevance threshold
          $items = Item::search($query, null, true)
            ->where('state_id', $state_obj->id)
            ->where('city_id', $city_obj->id)
            ->where('item_status', Item::ITEM_PUBLISHED)
            ->with('category')
            ->with('features')
            ->paginate(10);
        }
      } else {
        if ($category != 0) {
          // Search with lower relevance threshold
          $items = Item::search($query, null, true)
            ->where('category_id', $category)
            ->where('state_id', $state_obj->id)
            ->where('item_status', Item::ITEM_PUBLISHED)
            ->with('category')
            ->with('features')
            ->paginate(10);
        } else {
          // Search with lower relevance threshold
          $items = Item::search($query, null, true)
            ->where('state_id', $state_obj->id)
            ->where('item_status', Item::ITEM_PUBLISHED)
            ->with('category')
            ->with('features')
            ->paginate(10);
        }
      }
    } else {
      $items = [];
    }

    /**
     * Start SEO
     */
    $settings = Setting::find(1);
    //SEOMeta::setTitle('Search Listings - ' . (empty($settings->setting_site_name) ? config('app.name', 'Laravel') : $settings->setting_site_name));
    SEOMeta::setTitle(__('seo.frontend.search', ['site_name' => empty($settings->setting_site_name) ? config('app.name', 'Laravel') : $settings->setting_site_name]));
    SEOMeta::setDescription('');
    SEOMeta::setCanonical(URL::current());
    SEOMeta::addKeyword($settings->setting_site_seo_home_keywords);
    /**
     * End SEO
     */

    $search_all_categories = Category::all();
    $states_cities_array = $this->getStatesCitiesJson();
    $search_states_json = json_encode($states_cities_array['states']);
    $search_cities_json = json_encode($states_cities_array['cities']);

    return response()->view(
      'frontend.search',
      compact(
        'search_all_categories',
        'items',
        'search_states_json',
        'search_cities_json',
        'last_search_query',
        'last_search_city_state',
        'last_search_category'
      )
    );
  }

  public function about()
  {
    /**
     * Start SEO
     */
    $settings = Setting::find(1);
    //SEOMeta::setTitle('About - ' . (empty($settings->setting_site_name) ? config('app.name', 'Laravel') : $settings->setting_site_name));
    SEOMeta::setTitle(__('seo.frontend.about', ['site_name' => empty($settings->setting_site_name) ? config('app.name', 'Laravel') : $settings->setting_site_name]));
    SEOMeta::setDescription('');
    SEOMeta::setCanonical(URL::current());
    SEOMeta::addKeyword($settings->setting_site_seo_home_keywords);
    /**
     * End SEO
     */

    if ($settings->setting_page_about_enable == Setting::ABOUT_PAGE_ENABLED) {
      $about = $settings->setting_page_about;

      return response()->view(
        'frontend.about',
        compact('about')
      );
    } else {
      return redirect()->route('page.home');
    }
  }

  public function contact()
  {
    /**
     * Start SEO
     */
    $settings = Setting::find(1);
    //SEOMeta::setTitle('Contact - ' . (empty($settings->setting_site_name) ? config('app.name', 'Laravel') : $settings->setting_site_name));
    SEOMeta::setTitle(__('seo.frontend.contact', ['site_name' => empty($settings->setting_site_name) ? config('app.name', 'Laravel') : $settings->setting_site_name]));
    SEOMeta::setDescription('');
    SEOMeta::setCanonical(URL::current());
    SEOMeta::addKeyword($settings->setting_site_seo_home_keywords);
    /**
     * End SEO
     */

    $all_faq = Faq::orderBy('faqs_order')->get();
    $all_settings = Setting::find(1);

    return response()->view(
      'frontend.contact',
      compact('all_faq', 'all_settings')
    );
  }

  public function doContact(Request $request)
  {
    $request->validate([
      'first_name' => 'required|string|max:255',
      'last_name' => 'required|string|max:255',
      'email' => 'required|email|max:255',
      'subject' => 'required|max:255',
      'message' => 'required',
    ]);

    // send an email notification to admin
    $email_admin = User::getAdmin();
    $email_subject = __('email.contact.subject');
    $email_notify_message = [
      __('email.contact.body.body-1', ['first_name' => $request->first_name, 'last_name' => $request->last_name]),
      __('email.contact.body.body-2', ['subject' => $request->subject]),
      __('email.contact.body.body-3', ['first_name' => $request->first_name, 'last_name' => $request->last_name, 'email' => $request->email]),
      __('email.contact.body.body-4'),
      $request->message,
    ];

    try {
      // to admin
      Mail::to($email_admin)->send(
        new Notification(
          $email_subject,
          $email_admin->name,
          null,
          $email_notify_message
        )
      );

      \Session::flash('flash_message', __('alert.message-send'));
      \Session::flash('flash_type', 'success');
    } catch (\Exception $e) {
      Log::error($e->getMessage() . "\n" . $e->getTraceAsString());
      $error_message = $e->getMessage();

      \Session::flash('flash_message', $error_message);
      \Session::flash('flash_type', 'danger');
    }

    return redirect()->route('page.contact');
  }

  public function categories()
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

  public function categoryByState(string $category_slug, string $state_slug)
  {
    $category = Category::where('category_slug', $category_slug)->first();
    $state = State::where('state_slug', $state_slug)->first();

    if ($category && $state) {
      //            $items = $category->items()
      //                ->where('state_id', $state->id)
      //                ->latest('created_at')
      //                ->paginate(10);

      /**
       * Start SEO
       */
      $settings = Setting::find(1);
      SEOMeta::setTitle($category->category_name . 'of ' . $state->state_name . ' - ' . (empty($settings->setting_site_name) ? config('app.name', 'Laravel') : $settings->setting_site_name));
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
        ->where(function ($query) use ($category, $state, $settings) {
          $query->where("items.category_id", $category->id)
            ->where('items.state_id', $state->id)
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
        ->where(function ($query) use ($category, $state, $settings) {
          $query->where("items.category_id", $category->id)
            ->where('items.state_id', $state->id)
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

      $all_cities = City::whereHas('items', function ($query) use ($category, $state, $settings) {
        $query->where('category_id', $category->id)
          ->where('state_id', $state->id)
          ->where('country_id', $settings->setting_site_location_country_id);
      }, '>', 0)->orderBy('city_name')->get();

      /**
       * initial search bar
       */
      $search_all_categories = Category::all();
      $states_cities_array = $this->getStatesCitiesJson();
      $search_states_json = json_encode($states_cities_array['states']);
      $search_cities_json = json_encode($states_cities_array['cities']);

      return response()->view(
        'frontend.category.state',
        compact(
          'category',
          'state',
          'paid_items',
          'free_items',
          'pagination',
          'all_cities',
          'search_all_categories',
          'search_states_json',
          'search_cities_json'
        )
      );
    } else {
      abort(404);
    }
  }

  public function categoryByStateCity(string $category_slug, string $state_slug, string $city_slug)
  {
    $category = Category::where('category_slug', $category_slug)->first();
    $state = State::where('state_slug', $state_slug)->first();
    $city = $state->cities()->where('city_slug', $city_slug)->first();

    if ($category && $state && $city) {
      //            $items = $category->items()
      //                ->where('state_id', $state->id)
      //                ->where('city_id', $city->id)
      //                ->latest('created_at')
      //                ->paginate(10);

      /**
       * Start SEO
       */
      $settings = Setting::find(1);
      SEOMeta::setTitle($category->category_name . 'of ' . $state->state_name . ', ' . $city->city_name . ' - ' . (empty($settings->setting_site_name) ? config('app.name', 'Laravel') : $settings->setting_site_name));
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
        ->where(function ($query) use ($category, $state, $city, $settings) {
          $query->where("items.category_id", $category->id)
            ->where('items.state_id', $state->id)
            ->where('items.city_id', $city->id)
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
        ->where(function ($query) use ($category, $state, $city, $settings) {
          $query->where("items.category_id", $category->id)
            ->where('items.state_id', $state->id)
            ->where('items.city_id', $city->id)
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

      $all_cities = City::whereHas('items', function ($query) use ($category, $state, $settings) {
        $query->where('category_id', $category->id)
          ->where('state_id', $state->id)
          ->where('country_id', $settings->setting_site_location_country_id);
      }, '>', 0)->orderBy('city_name')->get();

      /**
       * initial search bar
       */
      $search_all_categories = Category::all();
      $states_cities_array = $this->getStatesCitiesJson();
      $search_states_json = json_encode($states_cities_array['states']);
      $search_cities_json = json_encode($states_cities_array['cities']);

      return response()->view(
        'frontend.category.city',
        compact(
          'category',
          'state',
          'city',
          'paid_items',
          'free_items',
          'pagination',
          'all_cities',
          'search_all_categories',
          'search_states_json',
          'search_cities_json'
        )
      );
    } else {
      abort(404);
    }
  }

  public function state(string $state_slug)
  {
    $state = State::where('state_slug', $state_slug)->first();

    if ($state) {
      //            $items = Item::where('state_id', $state->id)
      //                ->latest('created_at')
      //                ->paginate(10);

      /**
       * Start SEO
       */
      $settings = Setting::find(1);
      //SEOMeta::setTitle('All Categories of ' . $state->state_name . ' - ' . (empty($settings->setting_site_name) ? config('app.name', 'Laravel') : $settings->setting_site_name));
      SEOMeta::setTitle(__('seo.frontend.categories-state', ['state_name' => $state->state_name, 'site_name' => empty($settings->setting_site_name) ? config('app.name', 'Laravel') : $settings->setting_site_name]));
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
        ->where(function ($query) use ($state, $settings) {
          $query->where("items.state_id", $state->id)
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
        ->where(function ($query) use ($state, $settings) {
          $query->where("items.state_id", $state->id)
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


      $all_cities = City::whereHas('items', function ($query) use ($state, $settings) {
        $query->where('state_id', $state->id)
          ->where('country_id', $settings->setting_site_location_country_id);
      }, '>', 0)->orderBy('city_name')->get();

      /**
       * initial search bar
       */
      $search_all_categories = Category::all();
      $states_cities_array = $this->getStatesCitiesJson();
      $search_states_json = json_encode($states_cities_array['states']);
      $search_cities_json = json_encode($states_cities_array['cities']);

      return response()->view(
        'frontend.state',
        compact(
          'state',
          'paid_items',
          'free_items',
          'pagination',
          'all_cities',
          'search_all_categories',
          'search_states_json',
          'search_cities_json'
        )
      );
    } else {
      abort(404);
    }
  }

  public function city(string $state_slug, string $city_slug)
  {
    $state = State::where('state_slug', $state_slug)->first();
    $city = $state->cities()->where('city_slug', $city_slug)->first();

    if ($state && $city) {
      //            $items = Item::where('state_id', $state->id)
      //                ->where('city_id', $city->id)
      //                ->latest('created_at')
      //                ->paginate(10);

      /**
       * Start SEO
       */
      $settings = Setting::find(1);
      //SEOMeta::setTitle('All Categories of ' . $state->state_name . ', ' . $city->city_name . ' - ' . (empty($settings->setting_site_name) ? config('app.name', 'Laravel') : $settings->setting_site_name));
      SEOMeta::setTitle(__('seo.frontend.categories-state-city', ['state_name' => $state->state_name, 'city_name' => $city->city_name, 'site_name' => empty($settings->setting_site_name) ? config('app.name', 'Laravel') : $settings->setting_site_name]));
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
        ->where(function ($query) use ($state, $city, $settings) {
          $query->where("items.state_id", $state->id)
            ->where("items.city_id", $city->id)
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
        ->where(function ($query) use ($state, $city, $settings) {
          $query->where("items.state_id", $state->id)
            ->where("items.city_id", $city->id)
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

      $all_cities = City::whereHas('items', function ($query) use ($state, $settings) {
        $query->where('state_id', $state->id)
          ->where('country_id', $settings->setting_site_location_country_id);
      }, '>', 0)->orderBy('city_name')->get();

      /**
       * initial search bar
       */
      $search_all_categories = Category::all();
      $states_cities_array = $this->getStatesCitiesJson();
      $search_states_json = json_encode($states_cities_array['states']);
      $search_cities_json = json_encode($states_cities_array['cities']);

      return response()->view(
        'frontend.city',
        compact(
          'state',
          'city',
          'paid_items',
          'free_items',
          'pagination',
          'all_cities',
          'search_all_categories',
          'search_states_json',
          'search_cities_json'
        )
      );
    } else {
      abort(404);
    }
  }

  public function item(string $item_slug)
  {
    //$item = Item::with('category')->with('features', 'features.customField')->where('item_slug', $item_slug)->first();
    $settings = Setting::find(1);

    $item = Item::where('item_slug', $item_slug)
      ->where('country_id', $settings->setting_site_location_country_id)
      ->where('item_status', Item::ITEM_PUBLISHED)
      ->get()->first();

    if ($item) {
      /**
       * Start SEO
       */
      SEOMeta::setTitle($item->item_title . ' - ' . (empty($settings->setting_site_name) ? config('app.name', 'Laravel') : $settings->setting_site_name));
      SEOMeta::setDescription('');
      SEOMeta::setCanonical(URL::current());
      SEOMeta::addKeyword($settings->setting_site_seo_home_keywords);
      /**
       * End SEO
       */


      /**
       * get 6 nearby items by current item lat and lng
       */
      $latitude = $item->item_lat;
      $longitude = $item->item_lng;

      $nearby_items = Item::selectRaw('*, ( 6367 * acos( cos( radians( ? ) ) * cos( radians( item_lat ) ) * cos( radians( item_lng ) - radians( ? ) ) + sin( radians( ? ) ) * sin( radians( item_lat ) ) ) ) AS distance', [$latitude, $longitude, $latitude])
        ->where('id', '!=', $item->id)
        ->where('country_id', $settings->setting_site_location_country_id)
        ->having('distance', '<', 500)
        ->orderBy('distance')
        ->orderBy('created_at', 'DESC')
        ->take(6)->get();

      /**
       * get 6 similar items by current item lat and lng
       */
      $similar_items = Item::selectRaw('*, ( 6367 * acos( cos( radians( ? ) ) * cos( radians( item_lat ) ) * cos( radians( item_lng ) - radians( ? ) ) + sin( radians( ? ) ) * sin( radians( item_lat ) ) ) ) AS distance', [$latitude, $longitude, $latitude])
        ->where('id', '!=', $item->id)
        ->where('category_id', $item->category_id)
        ->where('state_id', $item->state_id)
        ->where('country_id', $settings->setting_site_location_country_id)
        ->having('distance', '<', 500)
        ->orderBy('distance')
        ->orderBy('created_at', 'DESC')
        ->take(6)->get();

      /**
       * initial search bar
       */
      $search_all_categories = Category::all();
      $states_cities_array = $this->getStatesCitiesJson('US');
      $search_states_json = json_encode($states_cities_array['states']);
      $search_cities_json = json_encode($states_cities_array['cities']);

      return response()->view('frontend.item', compact(
        'item',
        'nearby_items',
        'similar_items',
        'search_all_categories',
        'search_states_json',
        'search_cities_json'
      ));
    } else {
      abort(404);
    }
  }

  public function emailItem(string $item_slug, Request $request)
  {
    $settings = Setting::find(1);

    $item = Item::where('item_slug', $item_slug)
      ->where('country_id', $settings->setting_site_location_country_id)
      ->where('item_status', Item::ITEM_PUBLISHED)
      ->get()->first();

    if ($item) {
      if (Auth::check()) {
        $request->validate([
          'item_share_email_name' => 'required|max:255',
          'item_share_email_from_email' => 'required|email|max:255',
          'item_share_email_to_email' => 'required|email|max:255',
        ]);

        // send an email notification to admin
        $email_to = $request->item_share_email_to_email;
        $email_from_name = $request->item_share_email_name;
        $email_note = $request->item_share_email_note;
        $email_subject = __('frontend.item.send-email-subject', ['name' => $email_from_name]);

        $email_notify_message = [
          __('frontend.item.send-email-body', ['from_name' => $email_from_name, 'url' => route('page.item', $item->item_slug)]),
          __('frontend.item.send-email-note'),
          $email_note,
        ];

        try {
          // to admin
          Mail::to($email_to)->send(
            new Notification(
              $email_subject,
              $email_to,
              null,
              $email_notify_message,
              __('frontend.item.view-listing'),
              'success',
              route('page.item', $item->item_slug)
            )
          );

          \Session::flash('flash_message', __('frontend.item.send-email-success'));
          \Session::flash('flash_type', 'success');
        } catch (\Exception $e) {
          Log::error($e->getMessage() . "\n" . $e->getTraceAsString());
          $error_message = $e->getMessage();

          \Session::flash('flash_message', $error_message);
          \Session::flash('flash_type', 'danger');
        }

        return redirect()->route('page.item', $item->item_slug);
      } else {
        \Session::flash('flash_message', __('frontend.item.send-email-error-login'));
        \Session::flash('flash_type', 'danger');

        return redirect()->route('page.item', $item->item_slug);
      }
    } else {
      abort(404);
    }
  }

  public function saveItem(Request $request, string $item_slug)
  {
    $settings = Setting::find(1);

    $item = Item::where('item_slug', $item_slug)
      ->where('country_id', $settings->setting_site_location_country_id)
      ->where('item_status', Item::ITEM_PUBLISHED)
      ->get()->first();

    if ($item) {
      if (Auth::check()) {
        $login_user = Auth::user();

        if ($login_user->hasSavedItem($item->id)) {
          \Session::flash('flash_message', __('frontend.item.save-item-error-exist'));
          \Session::flash('flash_type', 'danger');

          return redirect()->route('page.item', $item->item_slug);
        } else {
          $login_user->savedItems()->attach($item->id);

          \Session::flash('flash_message', __('frontend.item.save-item-success'));
          \Session::flash('flash_type', 'success');

          return redirect()->route('page.item', $item->item_slug);
        }



        //return response()->json(['success' => __('frontend.item.save-item-success')]);
      } else {
        \Session::flash('flash_message', __('frontend.item.save-item-error-login'));
        \Session::flash('flash_type', 'danger');

        return redirect()->route('page.item', $item->item_slug);

        //return response()->json(['error' => __('frontend.item.save-item-error-login')]);
      }
    } else {
      abort(404);
    }
  }

  public function unSaveItem(Request $request, string $item_slug)
  {
    $settings = Setting::find(1);

    $item = Item::where('item_slug', $item_slug)
      ->where('country_id', $settings->setting_site_location_country_id)
      ->where('item_status', Item::ITEM_PUBLISHED)
      ->get()->first();

    if ($item) {
      if (Auth::check()) {
        $login_user = Auth::user();

        if ($login_user->hasSavedItem($item->id)) {
          $login_user->savedItems()->detach($item->id);


          \Session::flash('flash_message', __('frontend.item.unsave-item-success'));
          \Session::flash('flash_type', 'success');

          return redirect()->route('page.item', $item->item_slug);
        } else {
          \Session::flash('flash_message', __('frontend.item.unsave-item-error-exist'));
          \Session::flash('flash_type', 'danger');
        }
      } else {
        \Session::flash('flash_message', __('frontend.item.unsave-item-error-login'));
        \Session::flash('flash_type', 'danger');

        return redirect()->route('page.item', $item->item_slug);

        //return response()->json(['error' => __('frontend.item.save-item-error-login')]);
      }
    } else {
      abort(404);
    }
  }

  public function blog()
  {
    /**
     * Start SEO
     */
    $settings = Setting::find(1);
    //SEOMeta::setTitle('Blog - ' . (empty($settings->setting_site_name) ? config('app.name', 'Laravel') : $settings->setting_site_name));
    SEOMeta::setTitle(__('seo.frontend.blog', ['site_name' => empty($settings->setting_site_name) ? config('app.name', 'Laravel') : $settings->setting_site_name]));
    SEOMeta::setDescription('');
    SEOMeta::setCanonical(URL::current());
    SEOMeta::addKeyword($settings->setting_site_seo_home_keywords);
    /**
     * End SEO
     */

    $data = [
      'posts' => \Canvas\Post::published()->orderByDesc('published_at')->simplePaginate(10),
    ];

    $all_topics = \Canvas\Topic::orderBy('name')->get();
    $all_tags = \Canvas\Tag::orderBy('name')->get();

    $recent_posts = \Canvas\Post::published()->orderByDesc('published_at')->take(5)->get();

    return response()->view(
      'frontend.blog.index',
      compact('data', 'all_topics', 'all_tags', 'recent_posts')
    );
  }

  public function blogByTag(string $tag_slug)
  {
    $tag = \Canvas\Tag::where('slug', $tag_slug)->first();

    if ($tag) {

      /**
       * Start SEO
       */
      $settings = Setting::find(1);
      //SEOMeta::setTitle('Blog of ' . $tag->name . ' - ' . (empty($settings->setting_site_name) ? config('app.name', 'Laravel') : $settings->setting_site_name));
      SEOMeta::setTitle(__('seo.frontend.blog-tag', ['tag_name' => $tag->name, 'site_name' => empty($settings->setting_site_name) ? config('app.name', 'Laravel') : $settings->setting_site_name]));
      SEOMeta::setDescription('');
      SEOMeta::setCanonical(URL::current());
      SEOMeta::addKeyword($settings->setting_site_seo_home_keywords);
      /**
       * End SEO
       */

      $data = [
        'posts' => \Canvas\Post::whereHas('tags', function ($query) use ($tag_slug) {
          $query->where('slug', $tag_slug);
        })->published()->orderByDesc('published_at')->simplePaginate(10),
      ];

      $all_topics = \Canvas\Topic::orderBy('name')->get();
      $all_tags = \Canvas\Tag::orderBy('name')->get();

      $recent_posts = \Canvas\Post::published()->orderByDesc('published_at')->take(5)->get();

      return response()->view(
        'frontend.blog.tag',
        compact('tag', 'data', 'all_topics', 'all_tags', 'recent_posts')
      );
    } else {
      abort(404);
    }
  }

  public function blogByTopic(string $topic_slug)
  {
    $topic = \Canvas\Topic::where('slug', $topic_slug)->first();

    if ($topic) {

      /**
       * Start SEO
       */
      $settings = Setting::find(1);
      //SEOMeta::setTitle('Blog of ' . $topic->name . ' - ' . (empty($settings->setting_site_name) ? config('app.name', 'Laravel') : $settings->setting_site_name));
      SEOMeta::setTitle(__('seo.frontend.blog-topic', ['topic_name' => $topic->name, 'site_name' => empty($settings->setting_site_name) ? config('app.name', 'Laravel') : $settings->setting_site_name]));
      SEOMeta::setDescription('');
      SEOMeta::setCanonical(URL::current());
      SEOMeta::addKeyword($settings->setting_site_seo_home_keywords);
      /**
       * End SEO
       */

      $data = [
        'posts' => \Canvas\Post::whereHas('topic', function ($query) use ($topic_slug) {
          $query->where('slug', $topic_slug);
        })->published()->orderByDesc('published_at')->simplePaginate(10),
      ];

      $all_topics = \Canvas\Topic::orderBy('name')->get();
      $all_tags = \Canvas\Tag::orderBy('name')->get();

      $recent_posts = \Canvas\Post::published()->orderByDesc('published_at')->take(5)->get();

      return response()->view(
        'frontend.blog.topic',
        compact('topic', 'data', 'all_topics', 'all_tags', 'recent_posts')
      );
    } else {
      abort(404);
    }
  }

  public function blogPost(string $blog_slug)
  {
    $posts = \Canvas\Post::with('tags', 'topic')->published()->get();
    //$posts = BlogPost::with('tags', 'topic')->published()->get();
    $post = $posts->firstWhere('slug', $blog_slug);

    if (optional($post)->published) {

      /**
       * Start SEO
       */
      $settings = Setting::find(1);
      SEOMeta::setTitle($post->title . ' - ' . (empty($settings->setting_site_name) ? config('app.name', 'Laravel') : $settings->setting_site_name));
      SEOMeta::setDescription('');
      SEOMeta::setCanonical(URL::current());
      SEOMeta::addKeyword($settings->setting_site_seo_home_keywords);
      /**
       * End SEO
       */

      $data = [
        'author' => $post->user,
        'post'   => $post,
        'meta'   => $post->meta,
      ];

      // IMPORTANT: This event must be called for tracking visitor/view traffic
      event(new \Canvas\Events\PostViewed($post));

      $all_topics = \Canvas\Topic::orderBy('name')->get();
      $all_tags = \Canvas\Tag::orderBy('name')->get();

      $recent_posts = \Canvas\Post::published()->orderByDesc('published_at')->take(5)->get();

      // used for comment
      $blog_post = BlogPost::published()->get()->firstWhere('slug', $blog_slug);

      return response()->view(
        'frontend.blog.show',
        compact('data', 'all_topics', 'all_tags', 'blog_post', 'recent_posts')
      );
    } else {
      abort(404);
    }
  }

  public function jsonGetCitiesByState(int $state_id)
  {
    $state = State::findOrFail($state_id);
    $cities = $state->cities()->select('id', 'city_name')->orderBy('city_name')->get()->toJson();

    return response()->json($cities);
  }

  public function jsonDeleteItemImageGallery(int $item_image_gallery_id)
  {
    $item_image_gallery = ItemImageGallery::findOrFail($item_image_gallery_id);

    Gate::authorize('delete-item-image-gallery', $item_image_gallery);

    if (Storage::disk('public')->exists('item/gallery/' . $item_image_gallery->item_image_gallery_name)) {
      Storage::disk('public')->delete('item/gallery/' . $item_image_gallery->item_image_gallery_name);
    }

    $item_image_gallery->delete();

    return response()->json(['success' => 'item image gallery deleted.']);
  }

  public function ajaxLocationSave(string $lat, string $lng)
  {
    session(['user_device_location_lat' => $lat]);
    session(['user_device_location_lng' => $lng]);

    return response()->json(['success' => 'location lat & lng saved to session']);
  }

  public function termsOfService()
  {
    /**
     * Start SEO
     */
    $settings = Setting::find(1);
    //SEOMeta::setTitle('Terms of Service - ' . (empty($settings->setting_site_name) ? config('app.name', 'Laravel') : $settings->setting_site_name));
    SEOMeta::setTitle(__('seo.frontend.terms-service', ['site_name' => empty($settings->setting_site_name) ? config('app.name', 'Laravel') : $settings->setting_site_name]));
    SEOMeta::setDescription('');
    SEOMeta::setCanonical(URL::current());
    SEOMeta::addKeyword($settings->setting_site_seo_home_keywords);
    /**
     * End SEO
     */

    if ($settings->setting_page_terms_of_service_enable == Setting::TERM_PAGE_ENABLED) {
      $terms_of_service = $settings->setting_page_terms_of_service;

      return response()->view(
        'frontend.terms-of-service',
        compact('terms_of_service')
      );
    } else {
      return redirect()->route('page.home');
    }
  }

  public function privacyPolicy()
  {
    /**
     * Start SEO
     */
    $settings = Setting::find(1);
    //SEOMeta::setTitle('Privacy Policy - ' . (empty($settings->setting_site_name) ? config('app.name', 'Laravel') : $settings->setting_site_name));
    SEOMeta::setTitle(__('seo.frontend.privacy-policy', ['site_name' => empty($settings->setting_site_name) ? config('app.name', 'Laravel') : $settings->setting_site_name]));
    SEOMeta::setDescription('');
    SEOMeta::setCanonical(URL::current());
    SEOMeta::addKeyword($settings->setting_site_seo_home_keywords);
    /**
     * End SEO
     */

    if ($settings->setting_page_privacy_policy_enable == Setting::PRIVACY_PAGE_ENABLED) {
      $privacy_policy = $settings->setting_page_privacy_policy;

      return response()->view(
        'frontend.privacy-policy',
        compact('privacy_policy')
      );
    } else {
      return redirect()->route('page.home');
    }
  }
}
