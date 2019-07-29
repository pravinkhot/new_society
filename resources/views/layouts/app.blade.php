<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Apali Society') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <!-- Fonts and icons -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    
    <!-- CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/materialize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    @yield('customCss')

    <!-- Custom CSS Files -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />

    <!-- Vendor CSS Files -->
        <!-- Ladda -->
        <link rel="stylesheet" href="{{ asset('vendor/ladda/css/ladda-themeless.min.css') }}">
</head>
@guest
    <body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu 1-column login-bg  blank-page blank-page" data-open="click" data-menu="vertical-modern-menu" data-col="1-column">
        @yield('content')
@else
    <body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu 2-columns" data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">
        @include('layouts.topbar')
        @include('layouts.sidebar')

        <!-- BEGIN: Page Main-->
            <div id="main">
                <div class="row">
                    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
                    @include('layouts.breadcrumb')

                    <div class="col s12">
                        <div class="container">
                            @yield('content')
                        </div>
                    </div>
                </div>
             </div>
        <!-- END: Page Main-->
@endguest

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- BEGIN VENDOR JS-->
        <script src="{{ asset('js/jQuery.min.js') }}" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->

    <!-- BEGIN APP JS-->
    <script src="{{ asset('js/style.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            baseUrl = "{{ url('/') }}";
        });
    </script>

    <!-- Plugin JS -->
        <!-- Sweet Alert -->
        <script src="{{ asset('js/plugins/sweetalert/sweetalert.min.js') }}"></script>
        <!-- Ladda -->
        <script src="{{ asset('vendor/ladda/js/spin.min.js') }}"></script>
        <script src="{{ asset('vendor/ladda/js/ladda.min.js') }}"></script>
    
    <!-- App Js -->
    <script src="{{ asset('js/custom/common/common.js') }}"></script>
    <script src="{{ asset('js/custom/common/ajax.js') }}"></script>
    <script src="{{ asset('js/custom/common/delete.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.datepicker').datepicker({
                format: 'dd-mm-yyyy'
            });
        });
    </script>
    @yield('customJs')
    
    <!-- Theme Customizer -->
        <div id="theme-cutomizer-out" class="theme-cutomizer sidenav row"></div>
    <!--/ Theme Customizer -->
</body>

</html>
