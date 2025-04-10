<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-topbar="light" data-sidebar-image="none">

    <head>
    <meta charset="utf-8" />
    <title>@yield('title') | Community Strength Barometer- CSB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Community Strength Barometer- CSB" name="description" />
    <!-- App favicon -->
    <!--<link rel="shortcut icon" href="{{ URL::asset('build/images/favicon.ico')}}">-->
    <link rel="shortcut icon" href="{{ URL::asset('build/images/favicons/favicon.ico')}}">
    <link rel="icon" href="{{ URL::asset('build/images/favicons/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('build/images/favicons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('build/images/favicons/favicon-16x16.png')}}">
        @include('layouts.head-css')
  </head>

    @yield('body')

    @yield('content')

    @include('layouts.vendor-scripts')
    </body>
</html>
