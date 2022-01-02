@extends('layouts.gift')
@section('title', 'detail page')

@section('content')
<body style="background: #272525;color:white;">
    <div  style="margin:0 auto;width: 90%;">
        <div class="row">
            <ul class="nav nav-tabs col-12" style="border: none;">
                <li class="nav-item col-6 text-center">
                    <a class="nav-link active" id="search-tab" data-toggle="tab" href="#search" role="tab">　検索　</a>
                </li>
                <li class="nav-item col-6 text-center">
                    <a class="nav-link" id="follower-tab" data-toggle="tab" href="#follower" role="tab">　フォロワー　</a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="form-group tab-pane active" id="search" role="tabpanel" aria-labelledby="search-tab">
                <form action="{{ route('gift.form.user.search', ['id' => $post->id ])}}" method="post">
                    {{ csrf_field()}}
                    {{method_field('get')}}
                    <div id="user">
                        <input type="text" class="form-control col-md-5 mt-3" style="background: #444444;color:white;" placeholder="ユーザーネームを入力してください" name="name">
                    </div>
                </form>
                <div class="mt-4">
                    @if(isset($search_users))
                    @foreach($search_users as $search_user)
                    <form action="{{ route('gift.form.user.store',['id' => $post->id])}}" method="GET">
                        <label style="display:flex; padding-top:3%;padding-left:2%;">
                            <p style="margin-bottom: 0;"><img src="{{asset('storage/uploads/'.$search_user->user_image)}}" style="width:15%; border-radius:50%;vertical-align:middle;">
                                <span style="margin-left: 3%;">{{$search_user->username}}</span>
                            </p>
                            <input type="hidden" name="gifted_user_id" value="{{ $search_user->id }}">
                            <input type="submit" value="選択" style="background: #7B7575;margin:6px 0 6px 0;color:white">
                        </label>
                    </form> 
                    @endforeach
                    @endif
                </div>
                @if(session('flash_message'))
                <div class="alert alert-primary" role="alert" style="margin-top:50px;">{{ session('flash_message')}}</div>
                @endif
            </div>
            <div class="form-group tab-pane" id="follower" role="tabpanel" aria-labelledby="follower-tab">
            <div class="mt-4">
                @foreach($users as $user)
                    <form action="{{ route('gift.form.user.store',['id' => $post->id])}}" method="GET">
                        <label style="display:flex; padding-top:3%;padding-left:2%;">
                            <p style="margin-bottom: 0;"><img src="{{asset('storage/uploads/'.$user->user_image)}}" style="width:15%; border-radius:50%;vertical-align:middle;">
                                <span style="margin-left: 3%;">{{$user->username}}</span>
                            </p>
                            <input type="hidden" name="gifted_user_id" value="{{ $user->id }}">
                            <input type="submit" value="選択" style="background: #7B7575;margin:6px 0 6px 0;color:white">
                        </label>
                    </form> 
                @endforeach
            </div>
            </div>
        </div>  
    </div>
    <style>
        .nav-tabs .nav-item .nav-link{
            background: #272525;
            border: none;
            color: #7B7575;
            padding-top: 0;
            margin-top:.5rem;
        }
        .nav-tabs .nav-item .nav-link.active{
            background: #272525;
            color: white;
            display: inline-block;
            border-bottom: 1px solid white;
        }
    </style>
</body>
@endsection