@extends('frontend.layouts.app')

@section('styles')
@endsection

@section('content')

    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('frontend/images/placeholder/header-inner.jpg') }});" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


                    <div class="row justify-content-center mt-5">
                        <div class="col-md-10 text-center">
                            <h1>{{ __('frontend.categories.title') }}</h1>
                            <p class="mb-0">{{ __('frontend.categories.description') }}</p>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


    <div class="site-section">
        <div class="container">

            <div class="overlap-category mb-5">
            @if(count($categories))

                <div class="row align-items-stretch no-gutters">
                @foreach( $categories as $key => $category )
                        <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
                            <a href="{{ route('page.category', $category->category_slug) }}" class="popular-category h-100">

                                @if($category->category_icon)
                                    <span class="icon"><span><i class="{{ $category->category_icon }}"></i></span></span>
                                @else
                                    <span class="icon"><span><i class="fas fa-heart"></i></span></span>
                                @endif

                                <span class="caption mb-2 d-block">{{ $category->category_name }}</span>
                                <span class="number">{{ $category->items_count }}</span>
                            </a>
                        </div>
                @endforeach
                </div>

            @endif
            </div>

            <div class="row mb-5">
                <div class="col-md-12 text-left border-primary">
                    <h2 class="font-weight-light text-primary">{{ __('frontend.categories.sub-title-1') }}</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">

                    <div class="row">

                        @if(count($paid_items))
                            @foreach($paid_items as $key => $item)
                                <div class="col-lg-6">
                                    @include('frontend.partials.paid-item-block')
                                </div>
                            @endforeach
                        @endif

                        @if(count($free_items))
                            @foreach($free_items as $key => $item)
                                <div class="col-lg-6">
                                    @include('frontend.partials.free-item-block')
                                </div>
                            @endforeach
                        @endif

                    </div>

                    <div class="row">
                        <div class="col-12">

                            {{ $pagination->links() }}
                        </div>
                    </div>


                </div>
                <div class="col-lg-3 ml-auto">
                    <div class="sticky-top pt-3">
                        @include('frontend.partials.search.side')
                    </div>
                </div>

            </div>

        </div>
    </div>

    @if(count($all_states))
        <div class="site-section bg-light">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-7 text-left border-primary">
                        <h2 class="font-weight-light text-primary">{{ __('frontend.categories.sub-title-2') }}</h2>
                    </div>
                </div>
                <div class="row mt-5">

                    @foreach($all_states as $key => $state)
                        <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
                            <a href="{{ route('page.state', ['state_slug' => $state->state_slug]) }}">{{ $state->state_name }}</a>
                            ({{ $state->items_count }})
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    @endif

@endsection

@section('scripts')

    @include('frontend.partials.search.js')
@endsection
