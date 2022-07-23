<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CAVWOC') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    <!-- ==============================================
	Favicons
	=============================================== -->
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">
    <link rel="apple-touch-icon" href="{{asset('images/apple-touch-icon.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('images/apple-touch-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('images/apple-touch-icon-114x114.png')}}">

    <!-- ==============================================
    CSS VENDOR
    =============================================== -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/vendor/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/vendor/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/vendor/owl.carousel.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/vendor/owl.theme.default.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/vendor/magnific-popup.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/vendor/animate.min.css')}}">

    <!-- ==============================================
    Custom Stylesheet
    =============================================== -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"/>

    <script src="{{asset('js/vendor/modernizr.min.js')}}"></script>

</head>
<body>


@include('public.incl.navbar')


@yield('content')


<!-- JS VENDOR -->
<script src="{{asset('js/vendor/jquery.min.js')}}"></script>
<script src="{{asset('js/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('js/vendor/owl.carousel.js')}}"></script>
<script src="{{asset('js/vendor/jquery.magnific-popup.min.js')}}"></script>

<!-- SENDMAIL -->
<script src="{{asset('js/vendor/validator.min.js')}}"></script>
<script src="{{asset('js/vendor/form-scripts.js')}}"></script>

<!-- GOOGLEMAP -->
<script src="{{asset('js/googlemap-setting.js')}}"></script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU&callback=initMap"></script>

<script src="{{asset('js/script.js')}}"></script>


</body>
</html>
