@extends('layouts.setting')
@section('content')

<body style="background: #272525;color:white;">
    <p><a href="{{ url('register/artist') }}">アーティスト登録</a></p>
    <p><a href="{{ url('/profile') }}">ユーザーアカウントに変更</a></p>
    <a href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
        
    </form>

    @extends('layouts.app_footer')
</body>
@endsection