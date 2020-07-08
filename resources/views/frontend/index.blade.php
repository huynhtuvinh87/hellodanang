@extends('frontend.layouts.app')

@section('styles')
@endsection

@section('content')
<div class="site-blocks-cover overlay" style="background-image: url( {{ asset('frontend/images/placeholder/header-1.jpg') }});" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center">

      <div class="col-md-12">


        <div class="row justify-content-center mb-4">
          <div class="col-md-10 text-center">
            <h1 class="" data-aos="fade-up">{{ __('frontend.homepage.title') }}</h1>
            <p data-aos="fade-up" data-aos-delay="100">{{ __('frontend.homepage.description') }}</p>
          </div>
        </div>

        <div class="form-search-wrap" data-aos="fade-up" data-aos-delay="200">
          @include('frontend.partials.search.head')
        </div>
      </div>
    </div>
  </div>
</div>

<div class="site-section bg-light">
  <div class="container">

    <div class="overlap-category mb-5">
      <div class="row align-items-stretch no-gutters">

        @if(count($categories))
        @foreach($categories as $key => $category)
        <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
          <a href="{{ route('page.category', $category->category_slug) }}" class="popular-category h-100">

            @if($category->category_icon)
            <span class="icon"><span><i class="{{ $category->category_icon }}"></i></span></span>
            @else
            <span class="icon"><span><i class="fas fa-heart"></i></span></span>
            @endif
            <span class="caption mb-2 d-block">{{ $category->category_name }}</span>
            <span class="number">{{ number_format($category->items_count) }}</span>
          </a>
        </div>
        @endforeach
        <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
          <a href="{{ route('page.categories') }}" class="popular-category h-100">

            <span class="icon"><span><i class="fas fa-th"></i></span></span>
            <span class="caption mb-2 d-block">{{ __('frontend.homepage.all-categories') }}</span>
            <span class="number">{{ number_format($total_items_count) }}</span>
          </a>
        </div>
        @else
        <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
          <p>{{ __('frontend.homepage.no-categories') }}</p>
        </div>
        @endif
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <h2 class="h5 mb-4 text-black">{{ __('frontend.homepage.featured-ads') }}</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-12  block-13">
        <div class="owl-carousel nonloop-block-13">

          @if(count($paid_items))
          @foreach($paid_items as $key => $item)
          <div class="d-block d-md-flex listing vertical">
            <a href="{{ url($item->item_slug.'-'.$item->id) }}" class="img d-block" style="background-image: url({{ !empty($item->item_image_small) ? Storage::disk('public')->url('item/' . $item->item_image_small) : (!empty($item->item_image) ? Storage::disk('public')->url('item/' . $item->item_image) : asset('frontend/images/placeholder/full_item_feature_image_small.jpg')) }})"></a>
            <div class="lh-content">
              <a href="{{ route('page.category', $item->category_slug) }}">
                <span class="category">{{ $item->category_name }}</span>
              </a>

              <h3><a href="{{ url($item->item_slug.'-'.$item->id) }}">{{ str_limit($item->item_title, 44, '...') }}</a></h3>
              <address>
                <a href="{{ route('page.city', ['state_slug'=>'abc', 'city_slug'=>$item->city_slug]) }}">{{ $item->city_name }}</a>
              </address>

              <div class="row">
                <div class="col-3 pr-1">
                  @if(empty($item->user_image))
                  <img src="{{ asset('frontend/images/placeholder/profile-'. intval($item->user_id % 10) . '.jpg') }}" alt="Image" class="img-fluid rounded-circle">
                  @else

                  <img src="{{ Storage::disk('public')->url('user/' . $item->user_image) }}" alt="{{ $item->fullname }}" class="img-fluid rounded-circle">
                  @endif
                </div>
                <div class="col-9 line-height-1-2">

                  <div class="row pb-1">
                    <div class="col-12">
                      <span class="font-size-13">{{ $item->fullname }}</span>
                    </div>
                  </div>
                  <div class="row line-height-1-0">
                    <div class="col-12">
                      <span class="review">{{ $item->created_at->diffForHumans() }}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          @else
          <div class="d-block d-md-flex listing vertical">
            No featured listings
          </div>
          @endif

        </div>
      </div>


    </div>
  </div>
</div>

<div class="site-section" data-aos="fade">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center border-primary">
        <h2 class="font-weight-light text-default">{{ __('frontend.homepage.nearby-listings') }}</h2>
        <p class="color-black-opacity-5">{{ __('frontend.homepage.popular-listings') }}</p>
      </div>
    </div>

    <div class="row">

      @if(count($popular_items))
      @foreach($popular_items as $key => $item)
      <div class="col-md-6 mb-4 mb-lg-4 col-lg-4">

        <div class="listing-item listing">
          <div class="listing-image">
            <img src="{{ !empty($item->item_image_medium) ? Storage::disk('public')->url('item/' . $item->item_image_medium) : (!empty($item->item_image) ? Storage::disk('public')->url('item/' . $item->item_image) : asset('frontend/images/placeholder/full_item_feature_image_medium.jpg')) }}" alt="Image" class="img-fluid">
          </div>
          <div class="listing-item-content">
            <a class="px-3 mb-3 category" href="{{ route('page.category', $item->category_slug) }}">{{ $item->category_name }}</a>
            <h2 class="mb-1"><a href="{{ url( $item->item_slug.'-'.$item->id) }}">{{ $item->item_title }}</a></h2>
            <span class="address">
              <a href="{{ route('page.city', ['state_slug'=>'abc', 'city_slug'=>$item->city_slug]) }}">{{ $item->city_name }}</a>
            </span>

            <div class="row mt-1">
              <div class="col-2 pr-0">
                @if(empty($item->user_image))
                <img src="{{ asset('frontend/images/placeholder/profile-'. intval($item->user_id % 10) . '.jpg') }}" alt="Image" class="img-fluid rounded-circle">
                @else

                <img src="{{ Storage::disk('public')->url('user/' . $item->user_image) }}" alt="{{ $item->fullname }}" class="img-fluid rounded-circle">
                @endif
              </div>
              <div class="col-10 line-height-1-2">

                <div class="row pb-1">
                  <div class="col-12">
                    <span class="font-size-13">{{ $item->fullname }}</span>
                  </div>
                </div>
                <div class="row line-height-1-0">
                  <div class="col-12">
                    <span class="review">{{ $item->created_at->diffForHumans() }}</span>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>
      @endforeach
      @endif

    </div>
  </div>
</div>


<div class="site-section bg-light">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-7 text-left border-primary">
        <h2 class="font-weight-light text-default">{{ __('frontend.homepage.recent-listings') }}</h2>
      </div>
    </div>
    <div class="row mt-5">

      @if(count($latest_items))
      @foreach($latest_items as $key => $item)
      <div class="col-lg-6">
        <div class="d-block d-md-flex listing">
          <a href="{{ url( $item->item_slug.'-'.$item->id) }}" class="img d-block" style="background-image: url({{ !empty($item->item_image_small) ? Storage::disk('public')->url('item/' . $item->item_image_small) : (!empty($item->item_image) ? Storage::disk('public')->url('item/' . $item->item_image) : asset('frontend/images/placeholder/full_item_feature_image_small.jpg')) }})"></a>
          <div class="lh-content">
            <a href="{{ route('page.category', $item->category_slug) }}">
              <span class="category">{{ $item->category_name }}</span>
            </a>

            <h3><a href="{{ url($item->item_slug.'-'.$item->id) }}">{{ $item->item_title }}</a></h3>
            <address>
              <a href="{{ route('page.city', ['state_slug'=>'abc', 'city_slug'=>$item->city_slug]) }}">{{ $item->city_name }}</a>
            </address>

            <div class="row">
              <div class="col-2 pr-0">
                @if(empty($item->user_image))
                <img src="{{ asset('frontend/images/placeholder/profile-'. intval($item->user_id % 10) . '.jpg') }}" alt="Image" class="img-fluid rounded-circle">
                @else

                <img src="{{ Storage::disk('public')->url('user/' . $item->user_image) }}" alt="{{ $item->fullname }}" class="img-fluid rounded-circle">
                @endif
              </div>
              <div class="col-10 line-height-1-2">

                <div class="row pb-1">
                  <div class="col-12">
                    <span class="font-size-13">{{ $item->fullname }}</span>
                  </div>
                </div>
                <div class="row line-height-1-0">
                  <div class="col-12">
                    <span class="review">{{ $item->created_at->diffForHumans() }}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      @endif
    </div>
  </div>
</div>

@if(count($all_testimonials))
<div class="site-section bg-white">
  <div class="container">

    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center border-primary">
        <h2 class="font-weight-light text-primary">{{ __('frontend.homepage.testimonials') }}</h2>
      </div>
    </div>

    <div class="slide-one-item home-slider owl-carousel">

      @foreach($all_testimonials as $key => $testimonial)
      <div>
        <div class="testimonial">
          <figure class="mb-4">
            @if(empty($testimonial->testimonial_image))
            <img src="{{ asset('frontend/images/placeholder/profile-'. intval($testimonial->id % 10) . '.jpg') }}" alt="Image" class="img-fluid mb-3">
            @else
            <img src="{{ Storage::disk('public')->url('testimonial/' . $testimonial->testimonial_image) }}" alt="Image" class="img-fluid mb-3">
            @endif
            <p>
              {{ $testimonial->testimonial_name }}
              @if($testimonial->testimonial_job_title)
              {{ '• ' . $testimonial->testimonial_job_title }}
              @endif
              @if($testimonial->testimonial_company)
              {{ 'of ' . $testimonial->testimonial_company }}
              @endif
            </p>
          </figure>
          <blockquote>
            <p>{{ $testimonial->testimonial_description }}</p>
          </blockquote>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</div>
@endif


@if(count($recent_blog))
<div class="site-section bg-light">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center border-primary">
        <h2 class="font-weight-light text-primary">{{ __('frontend.homepage.our-blog') }}</h2>
        <p class="color-black-opacity-5">{{ __('frontend.homepage.our-blog-decr') }}</p>
      </div>
    </div>
    <div class="row mb-3 align-items-stretch">

      @foreach($recent_blog as $key => $post)
      <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
        <div class="h-entry">
          @if(empty($post->featured_image))
          <div class="mb-3" style="min-height:300px;border-radius: 0.25rem;background-image:url({{ asset('frontend/images/placeholder/full_item_feature_image_medium.jpg') }});background-size:cover;background-repeat:no-repeat;background-position: center center;"></div>
          @else
          <div class="mb-3" style="min-height:300px;border-radius: 0.25rem;background-image:url({{ url('laravel_project/public' . $post->featured_image) }});background-size:cover;background-repeat:no-repeat;background-position: center center;"></div>
          @endif
          <h2 class="font-size-regular"><a href="{{ route('page.blog.show', $post->slug) }}" class="text-black">{{ $post->title }}</a></h2>
          <div class="meta mb-3">
            by {{ $post->user()->get()->first()->name }}<span class="mx-1">&bullet;</span> {{ $post->updated_at->diffForHumans() }} <span class="mx-1">&bullet;</span>
            @if($post->topic()->get()->count() != 0)
            <a href="{{ route('page.blog.topic', $post->topic()->get()->first()->slug) }}">{{ $post->topic()->get()->first()->name }}</a>
            @else
            {{ __('frontend.blog.uncategorized') }}
            @endif

          </div>
          <p>{{ str_limit(preg_replace("/&#?[a-z0-9]{2,8};/i"," ", strip_tags($post->body)), 200) }}</p>
        </div>
      </div>
      @endforeach

      <div class="col-12 text-center mt-4">
        <a href="{{ route('page.blog') }}" class="btn btn-primary rounded py-2 px-4 text-white">{{ __('frontend.homepage.all-posts') }}</a>
      </div>
    </div>
  </div>
</div>
@endif
@endsection

@section('scripts')

@include('frontend.partials.search.js')

<script>
  $(document).ready(function() {

    /**
     * Start get user lat & lng location
     */

    function success(position) {
      const latitude = position.coords.latitude;
      const longitude = position.coords.longitude;

      console.log("Latitude: " + latitude + ", Longitude: " + longitude);

      var ajax_url = '/ajax/location/save/' + latitude + '/' + longitude;

      console.log(ajax_url);

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      jQuery.ajax({
        url: ajax_url,
        method: 'post',
        data: {},
        success: function(result) {
          console.log(result);
        }
      });
    }

    function error() {
      console.log("Unable to retrieve your location");
    }

    if (!navigator.geolocation) {

      console.log("Geolocation is not supported by your browser");
    } else {

      console.log("Locating ...");
      navigator.geolocation.getCurrentPosition(success, error);
    }
    /**
     * End get user lat & lng location
     */

  });
</script>

@endsection