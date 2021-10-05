
@extends('layouts.requests')
@section('content')
<body style="background: #272525;color:white;">
    <div style="margin-top:50px;">
        <p>フォローリクエスト一覧</p>
        @foreach($requests as $request)
            <nav style="display:flex; padding-top:3%;padding-left:2%;padding-bottom:10px;">
                <a href="{{ url('/followrequest/user/'.$request->user->id) }}">
                    <p style="margin-bottom: 0;"><img src="{{asset('storage/uploads/'.$request->user->user_image)}}" style="width:10%; border-radius:50%;vertical-align:middle;">
                    <!-- userはfollowingモデルのbelongToのやつ -->
                    <span style="margin-left: 3%;">{{$request->user->username}}</span>
                    </p>
                </a>
            </nav>
        @endforeach
    </div>
    @extends('layouts.app_footer')
</body>
@endsection