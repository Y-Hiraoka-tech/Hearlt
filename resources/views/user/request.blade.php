@extends('layouts.request')
@section('content')
@foreach($users as $user)
<body style="background: #272525;color:white;">
    <div style="text-align: center;margin-top:5%;">
        <h4>{{$user->name}}</h4>
        <img src="{{asset('storage/uploads/'.$user->user_image)}}" style="width: 50%;">
    </div>
    <table class="table col-6" style="margin:5% auto;color:white;text-align: center;">
        <tr style="text-align: center;">
            
            <th style="padding: 3px; border: 0px none;">
            {{ $posts->count }}
            </th>
            
            <th style="padding: 3px; border: 0px none;">{{ $followers->count }}</th>
            <th style="padding: 3px; border: 0px none;">{{ $followings->count }}</th>
        <tr>
            <td style="padding: 3px 6px; border: 0px none;">Music</td>
            <td style="padding: 3px 6px; border: 0px none;">Followers</td>
            <td style="padding: 3px 6px; border: 0px none;">Following</td>
        </tr>
    </table> 
    <form action="{{ route('followrequest.allow',$user->id) }}" style="text-align:center;">
        <button type="submit" class="btn btn-primary"  style="text-align:center;background-color:#7B7575;">
            フォロー承認する
        </button>
    </form>
    <form action="{{ route('followrequest.block',$user->id) }}" style="text-align:center;">
        <button type="submit" class="btn btn-primary"  style="text-align:center;background-color:#7B7575;">
            ブロックする
        </button>
    </form>
    
    <div class="introduction" style="width: 90%;margin:5% auto;text-align:center">
        <p>{{ $user->introduction}}</p>
    </div>
    @endforeach
    
        <div class="col-12 music" style="border-top:solid 1px;overflow:auto;width:100%;height:350px;">
            <div class="row">
                <!-- @foreach($posts as $post)
                <div class="col-4"  style="padding: 0 0;">
                    <a href="{{ url('posts/show/'.$post->id) }}">
                    <img  src="{{asset('storage/uploads/'.$post->music_image)}}" style="width: 100%;">
                    </a>
                </div>
                @endforeach -->
            </div>
        </div> 
</body>

@endsection