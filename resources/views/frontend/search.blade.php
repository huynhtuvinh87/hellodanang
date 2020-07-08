@extends('frontend.layouts.app')

@section('styles')
    <link href="{{ asset('frontend/vendor/leaflet/leaflet.css') }}" rel="stylesheet" />

@endsection

@section('content')
    <div class="site-blocks-cover overlay" style="background-image: url( {{ asset('frontend/images/placeholder/header-inner.jpg') }});" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-12">


                    <div class="row justify-content-center mb-4">
                        <div class="col-md-8 text-center">
                            <h1 class="" data-aos="fade-up">{{ __('frontend.search.title') }}</h1>
                            <p data-aos="fade-up" data-aos-delay="100">{{ __('frontend.search.description') }}</p>
                        </div>
                    </div>

                    <div class="form-search-wrap" data-aos="fade-up" data-aos-delay="200">
                        @include('frontend.partials.search.head')
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">

            <div class="row mb-5">
                <div class="col-md-12 text-left border-primary">
                    <h2 class="font-weight-light text-primary">{{ __('frontend.search.sub-title-1') }}</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">

                    <div class="row">

                        @if(isset($items))

                            @if(count($items))

                                @foreach($items as $key => $item)

                                    <div class="col-lg-6">

                                        @include('frontend.partials.free-item-block')
                                    </div>

                            @endforeach
                            @else
                                <div class="col-12">
                                    <p>{{ __('frontend.shared.no-listing') }}</p>
                                </div>
                            @endif
                        @endif

                    </div>

                    <div class="row">
                        <div class="col-12 mt-5 text-center">

                            @if(isset($items))
                                @if(count($items))
                                    {{ $items->links() }}
                                @endif
                            @endif
                        </div>
                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="sticky-top">
                        @if(isset($items))
                        <div id="mapid-search"></div>
                        @endif
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="{{ asset('frontend/vendor/leaflet/leaflet.js') }}"></script>

    <script>

        $(document).ready(function(){

            @if(isset($items))

            var map = L.map('mapid-search', {
                //center: [40.712, -74.227],
                zoom: 15,
                scrollWheelZoom: false,
            });

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            var bounds = [];
            @foreach($items as $key => $item)
                bounds.push([ {{ $item->item_lat }}, {{ $item->item_lng }} ]);
                L.marker([{{ $item->item_lat }}, {{ $item->item_lng }}]).addTo(map);
            @endforeach

            map.fitBounds(bounds);

            @endif
        });
    </script>

    @include('frontend.partials.search.js')
@endsection
