
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>HOME @yield('home')</title>

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

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light" style="border-bottom:solid 1px; display: flex;justify-content: center; position: relative; background-color: black;color:white;">
                <p style="margin-bottom: 0;">HOME</p>
                <p style=" position: absolute; right: 0;margin:auto 1%;"><a href="{{ route('post.create') }}"style="font-size:15px;color:white;text-decoration:underline">upload</a></p>
        </nav>
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
