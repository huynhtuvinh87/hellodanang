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
                            <h1>{{ $city->city_name }}, {{ $state->state_name }}</h1>
                            <p class="mb-0">{{ __('frontend.city.description') }}</p>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">

            <div class="row mb-5">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('page.home') }}">{{ __('frontend.shared.home') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('page.state', $state->state_slug) }}">{{ $state->state_name }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $city->city_name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-12 text-left border-primary">
                    <h2 class="font-weight-light text-primary">{{ $city->city_name }}, {{ $state->state_name }}</h2>
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
                        <div class="col-12 mt-5 text-center">

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

    @if(count($all_cities))
        <div class="site-section bg-light">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-7 text-left border-primary">
                        <h2 class="font-weight-light text-primary">{{ __('frontend.city.sub-title-2', ['state_name' => $state->state_name]) }}</h2>
                    </div>
                </div>
                <div class="row mt-5">

                    @foreach($all_cities as $key => $city)
                        <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
                            <a href="{{ route('page.city', ['state_slug' => $state->state_slug, 'city_slug' => $city->city_slug]) }}">{{ $city->city_name }}, {{ $state->state_name }}</a>
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
