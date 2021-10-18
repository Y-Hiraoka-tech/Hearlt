<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ONZO</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Turret+Road&display=swap" rel="stylesheet">

    </head>

    <body style="background-color:#272525;color:white;">
    <div style="text-align: right;">
        <a href="{{ url('/register/artist') }}">アーティスト登録</a>
    </div>
    <div style="text-align: center;margin-top:50%;">
        <h1 style="font-family: 'Turret Road', cursive;">Hearlt</h1>
    </div>
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0" style="margin-top: 70%;text-align:center">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                        <p><a href="{{ route('login') }}" style="color:white;text-decoration: none;font-size:20px;">Start</a></p>
                        @if (Route::has('register'))
                        <p style="margin-top: 30%;"><a href="{{ route('register') }}" style="color:white;">アカウントを作成する</a></p>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </body>
</html>
