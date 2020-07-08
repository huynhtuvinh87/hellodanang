<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {{-- google analytics --}}
    @include('frontend.partials.tracking')

    {!! SEO::generate() !!}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- favicon -->
    @if($site_global_settings->setting_site_favicon)
        <link rel="icon" type="icon" href="{{ Storage::disk('public')->url('setting/'. $site_global_settings->setting_site_favicon) }}" sizes="96x96"/>
    @else
        <link rel="icon" type="icon" href="{{ asset('favicon-16x16.ico') }}" sizes="16x16"/>
        <link rel="icon" type="icon" href="{{ asset('favicon-32x32.ico') }}" sizes="32x32"/>
        <link rel="icon" type="icon" href="{{ asset('favicon-96x96.ico') }}" sizes="96x96"/>
    @endif

    <!-- font awesome free icons -->
    <link href="{{ asset('backend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700,800" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('frontend/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/rangeslider.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <!-- Custom Style File -->
    <link rel="stylesheet" href="{{ asset('frontend/css/my-style.css') }}">

    @yield('styles')
</head>
<body>

<div class="site-wrap">

    {{-- nav bar --}}
    @include('frontend.partials.nav')

    {{-- main content --}}
    @yield('content')

    {{-- footer --}}
    @include('frontend.partials.footer')
</div>

<script src="{{ asset('frontend/vendor/pace/pace.min.js') }}"></script>

<script src="{{ asset('frontend/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery-ui.js') }}"></script>
<script src="{{ asset('frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('frontend/js/aos.js') }}"></script>
<script src="{{ asset('frontend/js/rangeslider.min.js') }}"></script>

<script src="{{ asset('frontend/js/main.js') }}"></script>


<script>
    $(document).ready(function(){

        /**
         * The front-end form disable submit button UI
         */
        $("form").on("submit", function () {
            $("form :submit").attr("disabled", true);
            return true;
        });

    });
</script>

@yield('scripts')

</body>
</html>


