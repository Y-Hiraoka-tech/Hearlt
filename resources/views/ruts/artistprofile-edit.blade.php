@extends('layouts.setting')
@section('content')

<body style="background: #272525;color:white;">
    <p><a href="{{ url('register/artist') }}">アーティスト登録</a></p>
    <a href="{{ route('artist.logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        ユーザーアカウントに変更
    </a>
    <form id="logout-form" action="{{ route('artist.logout') }}" method="POST" style="display: none;">
        @csrf
        
    </form>

    @extends('layouts.app_footer')
</body>
@endsection