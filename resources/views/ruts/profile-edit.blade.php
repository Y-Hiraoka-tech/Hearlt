@extends('layouts.setting')
@section('content')

<body style="background: #272525;color:white;">
@foreach($users as $user)
    <p style="margin-top: 5%;"><a href="{{ url('editaccount/'.$user->id) }}">プロフィール変更</a></p>
@endforeach
    <p><a href="{{ url('register/artist') }}">アーティスト登録</a></p>
    <p><a href="{{ url('profile/artist') }}">アーティストアカウントに変更</a></p>
    <p><a href="{{ url('user/private/'.$user->id) }}">公開範囲設定</a></p>
    <p><a href="{{ url('follow/requests') }}">フォローリクエスト一覧</a></p>
    <p><a href="{{ url('purchase/gift') }}">チケットを購入する</a></p>
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
