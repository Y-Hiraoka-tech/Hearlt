@extends('layouts.gift')
@section('title', 'detail page')

@section('content')
<body style="background: #272525;color:white;">
    <form action="{{ url('searchresult')}}" method="post">
        {{ csrf_field()}}
        {{method_field('get')}}
        <div class="mt-3"style="margin:0 auto;width: 85%;">
            <input type="text" class="form-control" style="background: #272525;color:white;"placeholder="Search" name="username">
            <button type="submit" class="btn btn-primary" style="display:none">検索</button>
        </div>
    </form>

        @if(session('flash_message'))
        <div class="alert alert-primary" role="alert" style="margin-top:50px;">{{ session('flash_message')}}</div>
        @endif
        <div style="margin-top:50px;">
            <p>ユーザー</p>
            @foreach($users as $user)
            <form action="{{ route('gift.form.user.store',['id' => $post->id])}}" method="GET">

                <label style="display:flex; padding-top:3%;padding-left:2%;padding-bottom:10px;">
                    <p style="margin-bottom: 0;"><img src="{{asset('storage/uploads/'.$user->user_image)}}" style="width:10%; border-radius:50%;vertical-align:middle;">
                        <span style="margin-left: 3%;">{{$user->username}}</span>
                    </p>
                </label>

            <input type="button" id="gifted_user_id"  name="gifted_user_id" value="{{ $user->id }}" hidden>
            <input type="submit" value="選択">
            </form>
            @endforeach
</body>
@endsection