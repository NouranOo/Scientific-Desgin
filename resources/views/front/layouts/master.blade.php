<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('css')
    @include('front.includes.css')
    <link
        href="https://fonts.googleapis.com/css?family=Cairo:200,300,400,600,700,900&display=swap&subset=arabic,latin-ext"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Almarai|Cairo:200,300,400,600,700,900&display=swap&subset=arabic,latin-ext"
        rel="stylesheet">
    <title>@yield('title')</title>
</head>
<body>
@include('front.includes.header')
@include('front.includes.slider')
@include('front.includes.msg')
@yield('content')
@include('front.includes.js')
@yield('js')
</body>
</html>
