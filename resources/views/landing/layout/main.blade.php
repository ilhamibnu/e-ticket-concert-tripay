<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dies Natalis @yield('title')</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&amp;display=swap" rel="stylesheet">

    <link href="{{ asset('landing/css/css-bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('landing/css/css-bootstrap-icons.css') }}" rel="stylesheet">

    <link href="{{ asset('landing/css/css-templatemo-festava-live.css') }}" rel="stylesheet">

    <!--

TemplateMo 583 Festava Live

https://templatemo.com/tm-583-festava-live

-->
</head>

<body>


    @yield('content')


    @include('landing.partials.footer')

    <!--

T e m p l a t e M o

-->

    <!-- JAVASCRIPT FILES -->
    <script src="{{ asset('landing/js/8057-js-jquery.min.js') }}"></script>
    <script src="{{ asset('landing/js/4385-js-bootstrap.min.js') }}"></script>
    <script src="{{ asset('landing/js/3411-js-jquery.sticky.js') }}"></script>
    <script src="{{ asset('landing/js/4088-js-click-scroll.js') }}"></script>
    <script src="{{ asset('landing/js/9062-js-custom.js') }}"></script>

</body>

</html>
