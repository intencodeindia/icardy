<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="icardy, dashboard" />
    <meta name="author" content="Intencode India" />
    <meta name="robots" content="index, follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="ICARDY: Identity Card Management Platform for Businesses, Schools and Organizations" />
    <meta property="og:title" content="ICARDY - Identity Card Management Platform" />
    <meta property="og:description" content="Create and manage ID cards for employees, students and faculty members with ICARDY's comprehensive identity card management platform" />
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="telephone=no">
    <title>ICARDY - Identity Card Management Platform</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/toastr/css/toastr.min.css') }}">
    <link href="{{ asset('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div id="main-wrapper">

        @include('layouts.navigation')

        <div class="deznav">
            <div class="deznav-scroll">
                @include('layouts.sidebar')

            </div>
        </div>

        <div class="content-body">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>

        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="http://intencode.com/" target="_blank">Intencode India</a> 2025</p>
            </div>
        </div>

    </div>

    <!-- Required vendors -->
    <script src="{{ asset('assets/js/global.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/Chart.bundle.min.js') }}"></script>

    <!-- Chart piety plugin files -->
    <script src="{{ asset('assets/vendor/peity/jquery.peity.min.js') }}"></script>

    <!-- Apex Chart -->
 <!-- Toastr -->
 <script src="{{ asset('assets/vendor/toastr/js/toastr.min.js') }}"></script>

    <!-- All init script -->
    <script src="{{ asset('assets/js/plugins-init/toastr-init.js') }}"></script>
    <!-- Dashboard 1 -->

    <script src="{{ asset('assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets/js/deznav-init.js') }}"></script>
    <script src="{{ asset('assets/js/demo.js') }}"></script>
    <!-- <script src="{{ asset('assets/js/styleSwitcher.js') }}"></script> -->

</body>

</html>