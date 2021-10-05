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
    <div style="margin-top:50px;">
    <p>検索結果</p>
    @if(isset($users))
    @foreach($users as $user)
    <div style="display:flex; padding-top:3%;padding-left:2%;padding-bottom:10px;">
                <p style="margin-bottom: 0;"><img src="{{asset('storage/uploads/'.$user->user_image)}}" style="width:10%; border-radius:50%;vertical-align:middle;">
                <span style="margin-left: 3%;">{{$user->username}}</span>
                </p>
    </div>
    @endforeach
    </table>
    @endif
    @if(!empty($message))
    <div class="alert alert-primary" role="alert">{{ $message}}</div>
    @endif
    </div>
    @extends('layouts.app_footer')
</body>
@endsection
