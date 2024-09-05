<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Analytics Dashboard | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Third party CSS -->
    <link href="{{ asset('assets/css/vendor/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet">

    <!-- App CSS -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" id="light-style">
    <link href="{{ asset('assets/css/app-dark.min.css') }}" rel="stylesheet" id="dark-style">

    <!-- Include any additional stylesheets -->
</head>

<body class="loading"
    data-layout-config='{"leftSideBarTheme":"light","layoutBoxed":false,"leftSidebarCondensed":false,"leftSidebarScrollable":false,"darkMode":false,"showRightSidebarOnStart":true}'>
    <!-- Wrapper -->
    <div class="wrapper">
        <!-- Include header -->
        @include('layouts.partials.header')

        <!-- Include sidebar -->
        @include('layouts.partials.Sidebar')

        <!-- Include footer -->
        @include('layouts.partials.Footer')

        @yield('ContentUser')

        <!-- Include scripts -->
        <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
        <script src="{{ asset('assets/js/app.min.js') }}"></script>

        <!-- Include any additional scripts -->
    </div>
</body>

</html>
