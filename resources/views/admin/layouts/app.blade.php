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

    <title>{{ config('app.name', 'CAVWOC') }}</title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin_assets/plugins/images/favicon.png')}}">
    <!-- Custom CSS -->
    <link href="{{asset('admin_assets/plugins/bower_components/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <link rel="stylesheet"
          href="{{asset('admin_assets/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css')}}">
    <!-- Custom CSS -->
    <link href="{{asset('admin_assets/css/style.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('admin_assets/summernote/summernote-bs4.min.css')}}">


</head>
<body>
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
     data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    @include('admin.incl.topbar')
    @include('admin.incl.sidebar')

    <div class="page-wrapper">
        @yield('content')
    </div>
</div>


<!-- All Jquery -->
<!-- ============================================================== -->
{{--<script src="{{asset('admin_assets/plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>--}}
<script src="{{asset('admin_assets/bootstrap/jquery.3.2.1.min.js')}}"></script>
<script src="{{asset('admin_assets/bootstrap/popper.min.js')}}"></script>

<script src="{{asset('admin_assets/bootstrap/bootstrap.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('admin_assets//summernote/summernote-bs4.min.js')}}"></script>

<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('admin_assets/js/app-style-switcher.js')}}"></script>
<script src="{{asset('admin_assets/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<!--Wave Effects -->
<script src="{{asset('admin_assets/js/waves.js')}}"></script>
<!--Menu sidebar -->
<script src="{{asset('admin_assets/js/sidebarmenu.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{asset('admin_assets/js/custom.js')}}"></script>
<!--This page JavaScript -->
<!--chartis chart-->
<script src="{{asset('admin_assets/plugins/bower_components/chartist/dist/chartist.min.js')}}"></script>
<script
    src="{{asset('admin_assets/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>
<script src="{{asset('admin_assets/js/pages/dashboards/dashboard1.js')}}"></script>
<script>
    $(function () {
        // Summernote
        $('.textarea_').summernote({
            placeholder: 'Project context goes here...',
            tabsize: 2,
            height: 300
        });


    });
</script>
</body>

</html>
