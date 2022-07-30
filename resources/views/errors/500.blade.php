<!DOCTYPE html>
<html dir="ltr">

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

</head>

<body>
<div class="main-wrapper">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Login box.scss -->
    <!-- ============================================================== -->
    <div class="error-box">
        <div class="error-body text-center">
            <h1 class="error-title text-danger">500 Internal Server Error</h1>
            <h3 class="text-uppercase error-subtitle">Oops something went wrong. The server encountered an internal
                error or misconfiguration and was unable to complete your request!</h3>
            <p class="text-muted mt-4 mb-4">CONTACT SUPPORT</p>
            <a href="mailto:support@cavwoc.org" class="btn btn-danger btn-rounded waves-effect waves-light mb-5 text-white">HERE</a>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Login box.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper scss in scafholding.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper scss in scafholding.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right Sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right Sidebar -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- All Required js -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{asset('admin_assets/plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('admin_assets/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
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

</body>

</html>
