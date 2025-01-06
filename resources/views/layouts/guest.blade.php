
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="ICARDY, ID cards, employee cards, student cards, faculty cards, identity management" />
	<meta name="author" content="ICARDY" />
	<meta name="robots" content="index, follow" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="ICARDY: Identity Card Management Platform for Businesses, Schools and Organizations" />
	<meta property="og:title" content="ICARDY - Identity Card Management Platform" />
	<meta property="og:description" content="Create and manage ID cards for employees, students and faculty members with ICARDY's comprehensive identity card management platform" />
	<meta name="format-detection" content="telephone=no">
    <title>ICARDY - Identity Card Management Platform</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
	<link href="{{ asset('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

</head>

<body class="vh-100">
   
@yield('content')


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets/js/deznav-init.js') }}"></script>
	<script src="{{ asset('assets/js/demo.js') }}"></script>
    <script src="{{ asset('assets/js/styleSwitcher.js') }}"></script>
</body>
</html>
