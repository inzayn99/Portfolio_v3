<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $setting->company_name }} | {{ @$meta['meta_title'] }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="{{ $setting->company_name }}">
    <meta name="keywords" content="vcard, resposnive, resume, personal, card, cv, cards, portfolio">
    <meta name="author" content>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=cyrillic" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=La+Belle+Aurore&family=Nanum+Pen+Script&display=swap" rel="stylesheet">
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/solid.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/brands.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/styles.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">
    <!--Favicons-->
    <link rel="shortcut icon" href="{{ $setting->company_favicon }}">
    @isset($meta)
        @yield('meta')
    @endisset
    @stack('styles')
</head>

<body>
    <x-header-component />

    @yield('content')
    @include('frontend.includes.footer')

    @stack('scripts')

    <!-- Below-scripts -->
    <script src="{{ asset('frontend/assets/js/scripts.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/skill/jquery.svg3dtagcloud.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/skill/jquery.svg3dtagcloud.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.tagcanvas.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/rubbber.js') }}"></script>
    {{-- <script src="{{ asset('frontend/assets/js/inspect.js') }}" defer></script> --}}

    {{-- @include('frontend.layouts.message') --}}

</body>

</html>
