@extends('layouts.search')
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
            <nav style="display:flex; padding-top:3%;padding-left:2%;padding-bottom:10px;">
                <a href="{{ url('/follow/user/'.$user->id) }}">
                    <p style="margin-bottom: 0;"><img src="{{asset('storage/uploads/'.$user->user_image)}}" style="width:10%; border-radius:50%;vertical-align:middle;">
                    <span style="margin-left: 3%;">{{$user->username}}</span>
                    </p>
                </a>
            </nav>
            @endforeach
            <p>アーティスト</p>
            @foreach($artists as $artist)
            <nav style="display:flex; padding-top:3%;padding-left:2%;padding-bottom:10px;">
                <a href="{{ url('/follow/artist/'.$artist->id) }}">
                    <p style="margin-bottom: 0;"><img src="{{asset('storage/uploads/'.$artist->artist_image)}}" style="width:10%; border-radius:50%;vertical-align:middle;">
                    <span style="margin-left: 3%;">{{$artist->name}}</span>
                    </p>
                </a>
            </nav>
            @endforeach
        </div>
    @extends('layouts.app_footer')
</body>
@endsection