<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('title')</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/tail.datetime-default-blue.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="{{ URL::asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery-throttle-debounce.min.js') }}"></script>
    <script src="{{ URL::asset('js/tail.datetime.min.js')}}" defer></script>
    <script src="{{ URL::asset('js/recruitment.js') }}" defer></script>
</head>
<body>
<!--  HEADER -->
    @include('layout/header')
<!--  HEADER -->
    
    @yield('content')

</body>
</html>