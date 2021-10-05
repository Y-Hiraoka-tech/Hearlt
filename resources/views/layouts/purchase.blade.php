<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PURCHASE @yield('purchase')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body style="background: #272525;color:white;">
    <div id="app">
        <nav class="navbar navtbar-expand-md navbar-ligh" style="justify-content: center;position: relative; border-bottom:solid 1px;">
                <input type="button" onclick="history.back()" value="＜" style="background-color:black;color:white;position: absolute;left: 0;">
                <div>
                <p style="margin-bottom: 0;">Purchase</p>
                </div>
        </nav>
        <main>
            @yield('content')
        </main>
    @extends('layouts.app_footer')
    </div>
</body>
</html>