<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-icons.min.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <link href="{{ asset('css/splide.min.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/splide.min.js') }}"></script>
</head>
<body>
@include('client.app.nav')
@include('client.app.alert')
@yield('content')
</body>
</html>
