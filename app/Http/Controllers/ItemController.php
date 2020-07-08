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

class ItemController extends Controller
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


  public function detail(Request $request)
  {
    try {
      $settings = \Constant::setting();
      $item = $this->_itemRepository->find($request->id);
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


      $nearby_items = $this->_itemRepository->getNearby($item);

      /**
       * get 6 similar items by current item lat and lng
       */
      $similar_items = $this->_itemRepository->getSimilar($item);

      /**
       * initial search bar
       */
      $search_all_categories = Category::all();


      return response()->view('frontend.item', compact(
        'item',
        'nearby_items',
        'similar_items',
        'search_all_categories'
      ));
    } catch (Exception $e) {
      throw $e;
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
}
