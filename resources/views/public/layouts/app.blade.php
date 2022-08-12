<!--

File Name: index.php

Author Name: Vitumbiko Mafeni

Author URI: https://www.linkedin.com/in/vitu-mafeni-074940173/

License URI: https://www.linkedin.com/in/vitu-mafeni-074940173/-->
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description"
          content="CAVWOC: Centre for Alternatives for Victimized Women and Children.
          We are a social service organization formed in 1997 and registered under the Trustees Incorporation Act of Malawi in 1998. We are affiliated to Council for Non-Governmental Organizations in Malawi (CONGOMA), NGO Board of Malawi, NGOGCN and the Human Rights Consultative Committee. CAVWOC was established with the sole purpose of providing technical and psychosocial support to women and children that are survivors of gender based violence and sexual reproductive health rights violations. As a local NGO, we support the rights of women and children in Malawi. We work to empower abused, vulnerable and marginalized women and children in order to provide them with knowledge, counsel and assistance in regards to their rights that will transform them from the state of being victimized and vulnerable into socially and economically empowered members of society. "
    />
    <meta name="keywords" content="CAVWOC, Centre, Alternatives, Victimized, Women, Malawi, Children, Trustees, Incorporation, Act, 1998, Non-Governmental, Organizations, CAVWOC, CONGOMA, NGOGCN, society"/>
    <meta name="author" content="Vitumbiko Mafeni"/>

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

    {{--  NIVO AWESOME SLIDER  --}}
    {{--    <link rel="stylesheet" href="{{asset('nivo_slider/themes/default/default.css')}}" type="text/css" media="screen" />--}}
    {{--    <link rel="stylesheet" href="{{asset('nivo_slider/nivo-slider.css')}}" type="text/css" media="screen" />--}}

    <link rel="stylesheet" href="{{asset('nivo_slider/new/nivo-slider-theme.css')}}" type="text/css" media="screen"/>
    <link rel="stylesheet" href="{{asset('nivo_slider/nivo-slider.css')}}" type="text/css" media="screen"/>
    <link rel="stylesheet" href="{{asset('datatable/datatables.min.css')}}">


</head>
<body>


@include('public.incl.navbar')


@yield('content')


<!-- JS VENDOR -->
<script src="{{asset('js/vendor/jquery.min.js')}}"></script>
<script src="{{asset('datatable/datatables.min.js')}}"></script>

<script src="{{asset('js/vendor/bootstrap.min.js')}}"></script>
{{--<script src="{{asset('js/vendor/owl.carousel.js')}}"></script>--}}
<script src="{{asset('js/vendor/jquery.magnific-popup.min.js')}}"></script>

<!-- SENDMAIL -->
<script src="{{asset('js/vendor/validator.min.js')}}"></script>
<script src="{{asset('js/vendor/form-scripts.js')}}"></script>

<!-- GOOGLEMAP -->
<script src="{{asset('js/googlemap-setting.js')}}"></script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU&callback=initMap"></script>

<script src="{{asset('js/script.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
{{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>--}}
{{--<script type="text/javascript" src="{{asset('nivo_slider/jquery.nivo.slider.js')}}"></script>--}}
<script type="text/javascript" src="{{asset('nivo_slider/new/jquery.nivo.slider.js')}}"></script>

<script type="application/javascript">
    $(document).ready(function () {
        if ($("#news_table").length > 0) {
            //datatable
            var table = $('#news_table').DataTable({
                columnDefs: [
                    {bSortable: false, targets: [0]}
                ],
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "aaSorting": []


            });

        }

        if ($(".customer-logos").length > 0) {
            $('.customer-logos').slick({
                slidesToShow: 6,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 1500,
                arrows: false,
                dots: false,
                pauseOnHover: false,
                responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 4
                    }
                }, {
                    breakpoint: 520,
                    settings: {
                        slidesToShow: 3
                    }
                }]
            });
        }


    });
    //---------------------------------------------
    //Nivo slider
    //---------------------------------------------
    $('#slider').nivoSlider({
        effect: 'random',
        slices: 50,
        boxCols: 12,
        boxRows: 8,
        animSpeed: 700,
        pauseTime: 7000,
        startSlide: 0,
        directionNav: true,
        controlNavThumbs: false,
        pauseOnHover: true,
        manualAdvance: false,
        prevText: 'Prev', // Prev directionNav text
        nextText: 'Next', // Next directionNav text
    });


</script>
{{--<script type="text/javascript">--}}
{{--    $(window).load(function() {--}}
{{--        $('#slider').nivoSlider();--}}
{{--    });--}}
{{--</script>--}}

</body>
</html>
