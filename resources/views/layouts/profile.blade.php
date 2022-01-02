@foreach($users as $user)
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PROFILE @yield('profile')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light" style="border-bottom:solid 1px;display: flex;justify-content: center; position: relative;background-color: black;color:white;">
                <p style="margin-bottom: 0;">{{$user->username}}</p>
                <a href="{{ route('announcement')}}" style="vertical-align:middle;position:absolute;right:50px;" >
                    <i class="far fa-bell fa-2x" style="color:#7B7575;"></i>
                    @if($receive_announcement->count > 0)
                    <span style="position:absolute;left:15px;" class="badge badge-danger">{{ $receive_announcement->count }}</span>
                    @endif
                </a>
                <p style=" position: absolute; right: 0;margin:auto 1%;"><a href="{{ url('/setting') }}"> 
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.6407 10.98C17.6818 10.66 17.7127 10.34 17.7127 10C17.7127 9.66 17.6818 9.34 17.6407 9.02L19.8099 7.37C20.0052 7.22 20.0566 6.95 19.9333 6.73L17.8772 3.27C17.7846 3.11 17.6099 3.02 17.4248 3.02C17.3631 3.02 17.3014 3.03 17.25 3.05L14.6902 4.05C14.1556 3.65 13.5799 3.32 12.9528 3.07L12.5621 0.42C12.5313 0.18 12.3154 0 12.0584 0H7.94616C7.68915 0 7.47326 0.18 7.44242 0.42L7.05176 3.07C6.42464 3.32 5.84894 3.66 5.31435 4.05L2.7545 3.05C2.69281 3.03 2.63113 3.02 2.56945 3.02C2.39468 3.02 2.21991 3.11 2.12738 3.27L0.0712765 6.73C-0.0623704 6.95 -0.00068705 7.22 0.194643 7.37L2.36384 9.02C2.32271 9.34 2.29187 9.67 2.29187 10C2.29187 10.33 2.32271 10.66 2.36384 10.98L0.194643 12.63C-0.00068705 12.78 -0.0520898 13.05 0.0712765 13.27L2.12738 16.73C2.21991 16.89 2.39468 16.98 2.57973 16.98C2.64141 16.98 2.70309 16.97 2.7545 16.95L5.31435 15.95C5.84894 16.35 6.42464 16.68 7.05176 16.93L7.44242 19.58C7.47326 19.82 7.68915 20 7.94616 20H12.0584C12.3154 20 12.5313 19.82 12.5621 19.58L12.9528 16.93C13.5799 16.68 14.1556 16.34 14.6902 15.95L17.25 16.95C17.3117 16.97 17.3734 16.98 17.4351 16.98C17.6099 16.98 17.7846 16.89 17.8772 16.73L19.9333 13.27C20.0566 13.05 20.0052 12.78 19.8099 12.63L17.6407 10.98ZM15.6052 9.27C15.6463 9.58 15.6566 9.79 15.6566 10C15.6566 10.21 15.636 10.43 15.6052 10.73L15.4612 11.86L16.3762 12.56L17.4865 13.4L16.7669 14.61L15.4612 14.1L14.3921 13.68L13.4668 14.36C13.0247 14.68 12.6032 14.92 12.1817 15.09L11.092 15.52L10.9275 16.65L10.7219 18H9.28263L9.0873 16.65L8.92281 15.52L7.83308 15.09C7.39102 14.91 6.97979 14.68 6.56857 14.38L5.63304 13.68L4.54331 14.11L3.23768 14.62L2.51804 13.41L3.62834 12.57L4.54331 11.87L4.39938 10.74C4.36854 10.43 4.34798 10.2 4.34798 10C4.34798 9.8 4.36854 9.57 4.39938 9.27L4.54331 8.14L3.62834 7.44L2.51804 6.6L3.23768 5.39L4.54331 5.9L5.61248 6.32L6.53773 5.64C6.97979 5.32 7.4013 5.08 7.8228 4.91L8.91253 4.48L9.07702 3.35L9.28263 2H10.7116L10.907 3.35L11.0714 4.48L12.1612 4.91C12.6032 5.09 13.0145 5.32 13.4257 5.62L14.3612 6.32L15.451 5.89L16.7566 5.38L17.4762 6.59L16.3762 7.44L15.4612 8.14L15.6052 9.27ZM10.0023 6C7.73027 6 5.89006 7.79 5.89006 10C5.89006 12.21 7.73027 14 10.0023 14C12.2743 14 14.1145 12.21 14.1145 10C14.1145 7.79 12.2743 6 10.0023 6ZM10.0023 12C8.87141 12 7.94616 11.1 7.94616 10C7.94616 8.9 8.87141 8 10.0023 8C11.1331 8 12.0584 8.9 12.0584 10C12.0584 11.1 11.1331 12 10.0023 12Z" fill="#7B7575"/>
                </svg></a></p>
        </nav>
        <main>
            @yield('content')
        </main>
        @endforeach
    </div>
</body>
</html>