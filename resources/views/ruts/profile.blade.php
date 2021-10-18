@extends('layouts.profile')
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
            <th style="padding: 3px; border: 0px none;">{{ $userfollowings->count + $artistfollowings->count }}</th>
        <tr>
            <td style="padding: 3px 6px; border: 0px none;">Music</td>
            <td style="padding: 3px 6px; border: 0px none;">Followers</td>
            <td style="padding: 3px 6px; border: 0px none;">Following</td>
        </tr>
    </table> 
    
    <div class="introduction" style="width: 90%;margin:0 auto;text-align:center">
        <p>{{ $user->introduction}}</p>
    </div>
    <div style="text-align: end;margin-right:5%;">
        <a href="{{ url('purchase/gift') }}">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14.5446 11C15.2943 11 15.9541 10.59 16.2939 9.97L19.8726 3.48C20.2425 2.82 19.7627 2 19.0029 2H4.20844L3.26879 0H0V2H1.99926L5.59792 9.59L4.24842 12.03C3.51869 13.37 4.47834 15 5.99777 15H17.9933V13H5.99777L7.09736 11H14.5446ZM5.15808 4H17.3036L14.5446 9H7.5272L5.15808 4ZM5.99777 16C4.89818 16 4.00851 16.9 4.00851 18C4.00851 19.1 4.89818 20 5.99777 20C7.09736 20 7.99703 19.1 7.99703 18C7.99703 16.9 7.09736 16 5.99777 16ZM15.9941 16C14.8945 16 14.0048 16.9 14.0048 18C14.0048 19.1 14.8945 20 15.9941 20C17.0937 20 17.9933 19.1 17.9933 18C17.9933 16.9 17.0937 16 15.9941 16Z" fill="white"/>
            </svg>
        </a>
    </div>
    @endforeach
    
    <div class="col-12" style="border-top:solid 1px;overflow:auto;width:100%;height:350px;">
        <div class="row">
        @foreach($posts as $post)
            <div class="col-4"  style="padding: 0 0;">
                <a href="{{ route('mymusic.show',$post->id) }}">
                    <img  src="{{asset('storage/uploads/'.$post->music_image)}}" style="width: 100%;">
                    <p>{{ $post->messege }}</p>
                </a>
            </div>
        @endforeach
        </div>
    </div>
    
    @extends('layouts.app_footer')
    
</body>
@endsection