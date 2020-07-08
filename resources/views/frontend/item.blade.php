@extends('frontend.layouts.app')

@section('styles')
<link href="{{ asset('frontend/vendor/leaflet/leaflet.css') }}" rel="stylesheet" />

<link rel="stylesheet" href="{{ asset('frontend/vendor/flexslider/flexslider.css') }}" type="text/css">

@endsection

@section('content')

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('frontend/images/placeholder/header-item-0.jpg') }});" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">

    <div class="row align-items-center item-blocks-cover d-none d-md-flex d-lg-flex d-xl-flex">

      <div class="col-lg-2 col-md-2 pt-5" data-aos="fade-up" data-aos-delay="400">
        @if(!empty($item->item_image_tiny))
        <img src="{{ Storage::disk('public')->url('item/' . $item->item_image_tiny) }}" alt="Image" class="img-fluid rounded">
        @elseif(!empty($item->item_image))
        <img src="{{ Storage::disk('public')->url('item/' . $item->item_image) }}" alt="Image" class="img-fluid rounded">
        @else
        <img src="{{ asset('frontend/images/placeholder/full_item_feature_image_tiny.jpg') }}" alt="Image" class="img-fluid rounded">
        @endif
      </div>
      <div class="col-lg-7 col-md-5 pt-5" data-aos="fade-up" data-aos-delay="400">

        <h1 class="item-cover-title-section">{{ $item->item_title }}</h1>
        <a class="btn btn-sm btn-outline-primary rounded mb-2" href="{{ route('page.category', $item->category->category_slug) }}">
          <span class="category">{{ $item->category->category_name }}</span>
        </a>
        <p class="item-cover-address-section">
          @if($item->item_address_hide == 0)
          {{ $item->item_address }} <br>
          @endif
          {{ $item->city->city_name }}, {{ $item->state->state_name }} {{ $item->item_postal_code }}
        </p>
        <a class="btn btn-primary rounded text-white" id="item-share-button"><i class="fas fa-share-alt"></i> {{ __('frontend.item.share') }}</a>
        @guest
        <a class="btn btn-primary rounded text-white" id="item-save-button"><i class="far fa-bookmark"></i> {{ __('frontend.item.save') }}</a>
        <form id="item-save-form" action="{{ route('page.item.save', ['item_slug' => $item->item_slug]) }}" method="POST" hidden="true">
          @csrf
        </form>
        @else
        @if(Auth::user()->hasSavedItem($item->id))
        <a class="btn btn-warning rounded text-white" id="item-saved-button"><i class="fas fa-check"></i> {{ __('frontend.item.saved') }}</a>
        <form id="item-unsave-form" action="{{ route('page.item.unsave', ['item_slug' => $item->item_slug]) }}" method="POST" hidden="true">
          @csrf
        </form>
        @else
        <a class="btn btn-primary rounded text-white" id="item-save-button"><i class="far fa-bookmark"></i> {{ __('frontend.item.save') }}</a>
        <form id="item-save-form" action="{{ route('page.item.save', ['item_slug' => $item->item_slug]) }}" method="POST" hidden="true">
          @csrf
        </form>
        @endif
        @endguest

      </div>
      <div class="col-lg-3 col-md-5 pt-5 pl-0 pr-0 item-cover-contact-section" data-aos="fade-up" data-aos-delay="400">
        @if(!empty($item->item_phone))
        <h3><i class="fas fa-phone-alt"></i> {{ $item->item_phone }}</h3>
        @endif
        <p>
          @if(!empty($item->item_website))
          <a class="mr-1" href="{{ $item->item_website }}" target="_blank" rel="nofollow"><i class="fas fa-globe"></i></a>
          @endif

          @if(!empty($item->item_social_facebook))
          <a class="mr-1" href="{{ $item->item_social_facebook }}" target="_blank" rel="nofollow"><i class="fab fa-facebook-square"></i></a>
          @endif

          @if(!empty($item->item_social_twitter))
          <a class="mr-1" href="{{ $item->item_social_twitter }}" target="_blank" rel="nofollow"><i class="fab fa-twitter-square"></i></a>
          @endif

          @if(!empty($item->item_social_linkedin))
          <a class="mr-1" href="{{ $item->item_social_linkedin }}" target="_blank" rel="nofollow"><i class="fab fa-linkedin"></i></a>
          @endif
        </p>
      </div>
    </div>

    <div class="row align-items-center item-blocks-cover d-flex d-md-none d-lg-none d-xl-none">
      <div class="col-12 pt-5" data-aos="fade-up" data-aos-delay="400">

        <h1 class="item-cover-title-section">{{ $item->item_title }}</h1>
        <a class="btn btn-sm btn-outline-primary rounded mb-2" href="{{ route('page.category', $item->category->category_slug) }}">
          <span class="category">{{ $item->category->category_name }}</span>
        </a>
        <p class="item-cover-address-section">
          @if($item->item_address_hide == 0)
          {{ $item->item_address }} <br>
          @endif
          {{ $item->city->city_name }}, {{ $item->state->state_name }} {{ $item->item_postal_code }}
        </p>

        @if(!empty($item->item_phone))
        <p><i class="fas fa-phone-alt"></i> {{ $item->item_phone }}</p>
        @endif

        <p>
          @if(!empty($item->item_website))
          <a class="mr-1" href="{{ $item->item_website }}" target="_blank" rel="nofollow"><i class="fas fa-globe"></i></a>
          @endif

          @if(!empty($item->item_social_facebook))
          <a class="mr-1" href="{{ $item->item_social_facebook }}" target="_blank" rel="nofollow"><i class="fab fa-facebook-square"></i></a>
          @endif

          @if(!empty($item->item_social_twitter))
          <a class="mr-1" href="{{ $item->item_social_twitter }}" target="_blank" rel="nofollow"><i class="fab fa-twitter-square"></i></a>
          @endif

          @if(!empty($item->item_social_linkedin))
          <a class="mr-1" href="{{ $item->item_social_linkedin }}" target="_blank" rel="nofollow"><i class="fab fa-linkedin"></i></a>
          @endif
        </p>

        <a class="btn btn-primary rounded text-white" id="item-share-button"><i class="fas fa-share-alt"></i> {{ __('frontend.item.share') }}</a>
        @guest
        <a class="btn btn-primary rounded text-white" id="item-save-button"><i class="far fa-bookmark"></i> {{ __('frontend.item.save') }}</a>
        <form id="item-save-form" action="{{ route('page.item.save', ['item_slug' => $item->item_slug]) }}" method="POST" hidden="true">
          @csrf
        </form>
        @else
        @if(Auth::user()->hasSavedItem($item->id))
        <a class="btn btn-warning rounded text-white" id="item-saved-button"><i class="fas fa-check"></i> {{ __('frontend.item.saved') }}</a>
        <form id="item-unsave-form" action="{{ route('page.item.unsave', ['item_slug' => $item->item_slug]) }}" method="POST" hidden="true">
          @csrf
        </form>
        @else
        <a class="btn btn-primary rounded text-white" id="item-save-button"><i class="far fa-bookmark"></i> {{ __('frontend.item.save') }}</a>
        <form id="item-save-form" action="{{ route('page.item.save', ['item_slug' => $item->item_slug]) }}" method="POST" hidden="true">
          @csrf
        </form>
        @endif
        @endguest

      </div>
    </div>

  </div>
</div>

<div class="site-section">
  <div class="container">

    @include('backend.admin.partials.alert')

    <div class="row mb-5">
      <div class="col-md-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('page.categories') }}">{{ __('frontend.item.all-categories') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('page.category', $item->category->category_slug) }}">{{ $item->category->category_name }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('page.category.state', ['category_slug'=>$item->category->category_slug, 'state_slug'=>$item->state->state_slug]) }}">{{ $item->state->state_name }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('page.category.state.city', ['category_slug'=>$item->category->category_slug, 'state_slug'=>$item->state->state_slug, 'city_slug'=>$item->city->city_slug]) }}">{{ $item->city->city_name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $item->item_title }}</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-8">

        <div class="mb-4">

          <div class="flexslider">
            <ul class="slides">

              @if(count($item->galleries) > 0)
              @foreach($item->galleries as $key => $gallery)
              <li data-thumb="{{ Storage::disk('public')->url('item/gallery/' . $gallery->item_image_gallery_name) }}">
                <img src="{{ Storage::disk('public')->url('item/gallery/' . $gallery->item_image_gallery_name) }}" alt="Image" class="img-fluid rounded">
              </li>
              @endforeach
              @else
              @if(empty($item->item_image))
              <li data-thumb="{{ asset('frontend/images/placeholder/full_item_feature_image.jpg') }}">
                <img src="{{ asset('frontend/images/placeholder/full_item_feature_image.jpg') }}" alt="Image" class="img-fluid rounded">
              </li>
              @else
              <li data-thumb="{{ Storage::disk('public')->url('item/' . $item->item_image) }}">
                <img src="{{ Storage::disk('public')->url('item/' . $item->item_image) }}" alt="Image" class="img-fluid rounded">
              </li>
              @endif
              @endif
            </ul>
          </div>

        </div>

        <h4 class="h5 mb-4 text-black">{{ __('frontend.item.description') }}</h4>
        <p>{!! clean(nl2br($item->item_description), array('HTML.Allowed' => 'b,strong,i,em,u,ul,ol,li,p,br')) !!}</p>

        <h4 class="h5 mb-4 mt-4 text-black">{{ __('frontend.item.location') }}</h4>
        <div class="row pt-2 pb-2">
          <div class="col-12">
            <div id="mapid-item"></div>
            <small>
              @if($item->item_address_hide == 0)
              {{ $item->item_address }}
              @endif
              {{ $item->city->city_name }}, {{ $item->state->state_name }} {{ $item->item_postal_code }}
            </small>
          </div>
        </div>

        <h4 class="h5 mb-4 mt-4 text-black">{{ __('frontend.item.features') }}</h4>
        @foreach($item->features as $key => $feature)
        <div class="row pt-2 pb-2 {{ $key%2 == 0 ? 'bg-light' : '' }}">
          <div class="col-3">
            {{ $feature->customField->custom_field_name }}
          </div>

          <div class="col-9">
            @if($feature->item_feature_value)
            @if($feature->customField->custom_field_type == \App\CustomField::TYPE_LINK)
            <a target="_blank" rel=”nofollow” href="{{ $feature->item_feature_value }}">{{ parse_url($feature->item_feature_value)['host'] }}</a>

            @elseif($feature->customField->custom_field_type == \App\CustomField::TYPE_MULTI_SELECT)
            @if(count(explode(',', $feature->item_feature_value)))

            @foreach(explode(',', $feature->item_feature_value) as $key => $value)
            <span class="review">{{ $value }}</span>
            @endforeach

            @else
            {{ $feature->item_feature_value }}
            @endif

            @elseif($feature->customField->custom_field_type == \App\CustomField::TYPE_SELECT)
            {{ $feature->item_feature_value }}

            @elseif($feature->customField->custom_field_type == \App\CustomField::TYPE_TEXT)
            {!! clean(nl2br($feature->item_feature_value), array('HTML.Allowed' => 'b,strong,i,em,u,ul,ol,li,p,br')) !!}
            @endif
            @endif
          </div>



        </div>
        @endforeach

        <h4 class="h5 mb-4 mt-4 text-black">{{ __('frontend.item.comments') }}</h4>
        @comments([
        'model' => $item,
        'approved' => true,
        'perPage' => 10
        ])

        <h4 class="h5 mb-4 mt-4 text-black">{{ __('frontend.item.share') }}</h4>
        <div class="row">
          <div class="col-12">

            <!-- Create link with share to Facebook -->
            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="facebook">
              <i class="fab fa-facebook-f"></i>
              {{ __('social_share.facebook') }}
            </a>

            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="twitter">
              <i class="fab fa-twitter"></i>
              {{ __('social_share.twitter') }}
            </a>

            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="linkedin">
              <i class="fab fa-linkedin-in"></i>
              {{ __('social_share.linkedin') }}
            </a>
            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="blogger">
              <i class="fab fa-blogger-b"></i>
              {{ __('social_share.blogger') }}
            </a>

            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="pinterest">
              <i class="fab fa-pinterest-p"></i>
              {{ __('social_share.pinterest') }}
            </a>
            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="evernote">
              <i class="fab fa-evernote"></i>
              {{ __('social_share.evernote') }}
            </a>
            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="reddit">
              <i class="fab fa-reddit-alien"></i>
              {{ __('social_share.reddit') }}
            </a>
            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="buffer">
              <i class="fab fa-buffer"></i>
              {{ __('social_share.buffer') }}
            </a>
            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="wordpress">
              <i class="fab fa-wordpress-simple"></i>
              {{ __('social_share.wordpress') }}
            </a>
            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="weibo">
              <i class="fab fa-weibo"></i>
              {{ __('social_share.weibo') }}
            </a>
            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="skype">
              <i class="fab fa-skype"></i>
              {{ __('social_share.skype') }}
            </a>
            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="telegram">
              <i class="fab fa-telegram-plane"></i>
              {{ __('social_share.telegram') }}
            </a>
            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="viber">
              <i class="fab fa-viber"></i>
              {{ __('social_share.viber') }}
            </a>
            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="whatsapp">
              <i class="fab fa-whatsapp"></i>
              {{ __('social_share.whatsapp') }}
            </a>
            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="wechat">
              <i class="fab fa-weixin"></i>
              {{ __('social_share.wechat') }}
            </a>
            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="line">
              <i class="fab fa-line"></i>
              {{ __('social_share.line') }}
            </a>

          </div>
        </div>

      </div>

      <div class="col-lg-3 ml-auto">

        <div class="sticky-top pt-3">

          <div class="row mb-4 align-items-center">
            <div class="col-4">
              @if(empty($item->user->user_image))
              <img src="{{ asset('frontend/images/placeholder/profile-'. intval($item->user->id % 10) . '.jpg') }}" alt="Image" class="img-fluid rounded-circle">
              @else

              <img src="{{ Storage::disk('public')->url('user/' . $item->user->user_image) }}" alt="{{ $item->user->name }}" class="img-fluid rounded-circle">
              @endif
            </div>
            <div class="col-8 pl-0">
              <span class="font-size-13">{{ $item->user->name }}</span><br />
              <span class="font-size-13">Posted {{ $item->created_at->diffForHumans() }}</span>
            </div>
          </div>

          <div class="row mb-4 align-items-center">
            <div class="col-12">

              @if(Auth::check())

              @if(Auth::user()->id != $item->user_id)
              @if(Auth::user()->isAdmin())
              <a href="{{ route('admin.messages.create', ['item'=>$item->id]) }}" class="btn btn-outline-primary btn-block rounded">{{ __('frontend.item.send-message') }}</a>
              @else
              <a href="{{ route('user.messages.create', ['item'=>$item->id]) }}" class="btn btn-outline-primary btn-block rounded">{{ __('frontend.item.send-message') }}</a>
              @endif
              @endif

              @else
              <a href="{{ route('user.messages.create', ['item'=>$item->id]) }}" class="btn btn-outline-primary btn-block rounded">{{ __('frontend.item.send-message') }}</a>
              @endif

            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>

@if($similar_items->count() > 0)
<div class="site-section bg-light">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-7 text-left border-primary">
        <h2 class="font-weight-light text-primary">{{ __('frontend.item.similar-listings') }}</h2>
      </div>
    </div>
    <div class="row mt-5">

      @foreach($similar_items as $key => $similar_item)
      <div class="col-lg-6">
        <div class="d-block d-md-flex listing">
          <a href="{{ url($similar_item->item_slug.'-'.$similar_item->id) }}" class="img d-block" style="background-image: url({{ !empty($similar_item->item_image_small) ? Storage::disk('public')->url('item/' . $similar_item->item_image_small) : (!empty($similar_item->item_image) ? Storage::disk('public')->url('item/' . $similar_item->item_image) : asset('frontend/images/placeholder/full_item_feature_image_small.jpg')) }})"></a>
          <div class="lh-content">
            <a href="{{ route('page.category', $similar_item->category->category_slug) }}">
              <span class="category">{{ $similar_item->category_name }}</span>
            </a>

            <h3><a href="{{ url( $similar_item->item_slug.'-'.$similar_item->id) }}">{{ $similar_item->item_title }}</a></h3>
            <address>
              <a href="{{ route('page.city', ['state_slug'=>$similar_item->state->state_slug, 'city_slug'=>$similar_item->city_slug]) }}">{{ $similar_item->city_name }}</a>

            </address>

            <div class="row">
              <div class="col-2 pr-0">
                @if(empty($similar_item->user->user_image))
                <img src="{{ asset('frontend/images/placeholder/profile-'. intval($similar_item->user_id % 10) . '.jpg') }}" alt="Image" class="img-fluid rounded-circle">
                @else

                <img src="{{ Storage::disk('public')->url('user/' . $similar_item->user_image) }}" alt="{{ $similar_item->fullname }}" class="img-fluid rounded-circle">
                @endif
              </div>
              <div class="col-10 line-height-1-2">

                <div class="row pb-1">
                  <div class="col-12">
                    <span class="font-size-13">{{ $similar_item->fullname }}</span>
                  </div>
                </div>
                <div class="row line-height-1-0">
                  <div class="col-12">
                    <span class="review">{{ $similar_item->created_at->diffForHumans() }}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</div>
@endif

@if($nearby_items->count() > 0)
<div class="site-section bg-light">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-7 text-left border-primary">
        <h2 class="font-weight-light text-primary">{{ __('frontend.item.nearby-listings') }}</h2>
      </div>
    </div>
    <div class="row mt-5">

      @foreach($nearby_items as $key => $nearby_item)
      <div class="col-lg-6">
        <div class="d-block d-md-flex listing">
          <a href="{{ url($nearby_item->item_slug.'-'.$nearby_item->id) }}" class="img d-block" style="background-image: url({{ !empty($nearby_item->item_image_small) ? Storage::disk('public')->url('item/' . $nearby_item->item_image_small) : (!empty($nearby_item->item_image) ? Storage::disk('public')->url('item/' . $nearby_item->item_image) : asset('frontend/images/placeholder/full_item_feature_image_small.jpg')) }})"></a>
          <div class="lh-content">
            <a href="{{ route('page.category', $nearby_item->category->category_slug) }}">
              <span class="category">{{ $nearby_item->category_name }}</span>
            </a>

            <h3><a href="{{ url($nearby_item->item_slug.'-'.$nearby_item->id) }}">{{ $nearby_item->item_title }}</a></h3>
            <address>
              <a href="{{ route('page.city', ['state_slug'=>$nearby_item->state->state_slug, 'city_slug'=>$nearby_item->city_slug]) }}">{{ $nearby_item->city_name }}</a>
            </address>

            <div class="row">
              <div class="col-2 pr-0">
                @if(empty($nearby_item->user->user_image))
                <img src="{{ asset('frontend/images/placeholder/profile-'. intval($nearby_item->user->id % 10) . '.jpg') }}" alt="Image" class="img-fluid rounded-circle">
                @else

                <img src="{{ Storage::disk('public')->url('user/' . $nearby_item->user_image) }}" alt="{{ $nearby_item->fullname }}" class="img-fluid rounded-circle">
                @endif
              </div>
              <div class="col-10 line-height-1-2">

                <div class="row pb-1">
                  <div class="col-12">
                    <span class="font-size-13">{{ $nearby_item->fullname }}</span>
                  </div>
                </div>
                <div class="row line-height-1-0">
                  <div class="col-12">
                    <span class="review">{{ $nearby_item->created_at->diffForHumans() }}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</div>
@endif

<!-- Modal - share -->
<div class="modal fade" id="share-modal" tabindex="-1" role="dialog" aria-labelledby="share-modal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">{{ __('frontend.item.share-listing') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="row">
          <div class="col-md-12">

            <p>{{ __('frontend.item.share-listing-social-media') }}</p>

            <!-- Create link with share to Facebook -->
            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="facebook">
              <i class="fab fa-facebook-f"></i>
              {{ __('social_share.facebook') }}
            </a>
            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="twitter">
              <i class="fab fa-twitter"></i>
              {{ __('social_share.twitter') }}
            </a>
            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="linkedin">
              <i class="fab fa-linkedin-in"></i>
              {{ __('social_share.linkedin') }}
            </a>
            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="blogger">
              <i class="fab fa-blogger-b"></i>
              {{ __('social_share.blogger') }}
            </a>
            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="pinterest">
              <i class="fab fa-pinterest-p"></i>
              {{ __('social_share.pinterest') }}
            </a>
            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="evernote">
              <i class="fab fa-evernote"></i>
              {{ __('social_share.evernote') }}
            </a>
            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="reddit">
              <i class="fab fa-reddit-alien"></i>
              {{ __('social_share.reddit') }}
            </a>
            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="buffer">
              <i class="fab fa-buffer"></i>
              {{ __('social_share.buffer') }}
            </a>
            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="wordpress">
              <i class="fab fa-wordpress-simple"></i>
              {{ __('social_share.wordpress') }}
            </a>
            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="weibo">
              <i class="fab fa-weibo"></i>
              {{ __('social_share.weibo') }}
            </a>
            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="skype">
              <i class="fab fa-skype"></i>
              {{ __('social_share.skype') }}
            </a>
            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="telegram">
              <i class="fab fa-telegram-plane"></i>
              {{ __('social_share.telegram') }}
            </a>
            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="viber">
              <i class="fab fa-viber"></i>
              {{ __('social_share.viber') }}
            </a>
            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="whatsapp">
              <i class="fab fa-whatsapp"></i>
              {{ __('social_share.whatsapp') }}
            </a>
            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="wechat">
              <i class="fab fa-weixin"></i>
              {{ __('social_share.wechat') }}
            </a>
            <a class="btn btn-primary text-white btn-sm rounded mb-2" href="" data-social="line">
              <i class="fab fa-line"></i>
              {{ __('social_share.line') }}
            </a>

          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-12">
            <p>{{ __('frontend.item.share-listing-email') }}</p>
            @if(!Auth::check())
            <div class="row mb-2">
              <div class="col-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ __('frontend.item.login-require') }}
                </div>
              </div>
            </div>
            @endif
            <form action="{{ route('page.item.email', ['item_slug' => $item->item_slug]) }}" method="POST">
              @csrf
              <div class="form-row mb-3">
                <div class="col-md-4">
                  <label for="item_share_email_name" class="text-black">{{ __('frontend.item.name') }}</label>
                  <input id="item_share_email_name" type="text" class="form-control @error('item_share_email_name') is-invalid @enderror" name="item_share_email_name" value="{{ old('item_share_email_name') }}" {{ Auth::check() ? '' : 'disabled' }}>
                  @error('item_share_email_name')
                  <span class="invalid-tooltip">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="col-md-4">
                  <label for="item_share_email_from_email" class="text-black">{{ __('frontend.item.email') }}</label>
                  <input id="item_share_email_from_email" type="email" class="form-control @error('item_share_email_from_email') is-invalid @enderror" name="item_share_email_from_email" value="{{ old('item_share_email_from_email') }}" {{ Auth::check() ? '' : 'disabled' }}>
                  @error('item_share_email_from_email')
                  <span class="invalid-tooltip">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="col-md-4">
                  <label for="item_share_email_to_email" class="text-black">{{ __('frontend.item.email-to') }}</label>
                  <input id="item_share_email_to_email" type="email" class="form-control @error('item_share_email_to_email') is-invalid @enderror" name="item_share_email_to_email" value="{{ old('item_share_email_to_email') }}" {{ Auth::check() ? '' : 'disabled' }}>
                  @error('item_share_email_to_email')
                  <span class="invalid-tooltip">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-row mb-3">
                <div class="col-md-12">
                  <label for="item_share_email_note" class="text-black">{{ __('frontend.item.add-note') }}</label>
                  <textarea class="form-control @error('item_share_email_note') is-invalid @enderror" id="item_share_email_note" rows="3" name="item_share_email_note" {{ Auth::check() ? '' : 'disabled' }}>{{ old('item_share_email_note') }}</textarea>
                  @error('item_share_email_note')
                  <span class="invalid-tooltip">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>
              <div class="form-row mb-3">
                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary py-2 px-4 text-white rounded" {{ Auth::check() ? '' : 'disabled' }}>
                    {{ __('frontend.item.send-email') }}
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary rounded" data-dismiss="modal">{{ __('backend.shared.cancel') }}</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="{{ asset('frontend/vendor/leaflet/leaflet.js') }}"></script>

<script src="{{ asset('frontend/vendor/flexslider/jquery.flexslider-min.js') }}"></script>

<script src="{{ asset('frontend/vendor/goodshare/goodshare.min.js') }}"></script>

<script>
  $(document).ready(function() {

    /**
     * Start initial map
     */
    var map = L.map('mapid-item', {
      center: [ {{$item->item_lat}}, {{$item->item_lng}}],
      zoom: 13,
      scrollWheelZoom: false,
    });

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([{{$item->item_lat}}, {{$item->item_lng}}]).addTo(map);
    /**
     * End initial map
     */

    /**
     * Start initial slider
     */
    $('.flexslider').flexslider({
      animation: "slide"
    });
    /**
     * End initial slider
     */

    $('#item-share-button').on('click', function() {
      $('#share-modal').modal('show');
    });

    @error('item_share_email_name')
    $('#share-modal').modal('show');
    @enderror

    @error('item_share_email_from_email')
    $('#share-modal').modal('show');
    @enderror

    @error('item_share_email_to_email')
    $('#share-modal').modal('show');
    @enderror

    @error('item_share_email_note')
    $('#share-modal').modal('show');
    @enderror

    $('#item-save-button').on('click', function() {
      $("#item-save-button").addClass("disabled");
      $("#item-save-form").submit();
    });

    $('#item-saved-button').on('click', function() {
      $("#item-saved-button").off("mouseenter");
      $("#item-saved-button").off("mouseleave");
      $("#item-saved-button").addClass("disabled");
      $("#item-unsave-form").submit();
    });

    $("#item-saved-button").on('mouseenter', function() {
      $("#item-saved-button").attr("class", "btn btn-danger rounded text-white");
      $("#item-saved-button").html("<i class=\"far fa-trash-alt\"></i> <?php echo __('frontend.item.unsave') ?>");
    });

    $("#item-saved-button").on('mouseleave', function() {
      $("#item-saved-button").attr("class", "btn btn-warning rounded text-white");
      $("#item-saved-button").html("<i class=\"fas fa-check\"></i> <?php echo __('frontend.item.saved') ?>");
    });

  });
</script>

@include('frontend.partials.search.js')
@endsection