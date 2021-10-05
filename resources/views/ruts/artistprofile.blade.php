@extends('layouts.artistprofile')
@section('content')
@foreach($artists as $artist)
<body style="background: #272525;color:white;">
    <div style="text-align: center;margin-top:5%;">
        <h4>{{$artist->name}}</h4>
        <img src="{{asset('storage/uploads/'.$artist->artist_image)}}" style="width: 50%;">
    </div>
    <table class="table col-6" style="margin:5% auto;color:white;text-align: center;">
        <tr style="text-align: center;">
            
            <th style="padding: 3px; border: 0px none;">
            {{ $posts->count }}
            </th>
            
            <th style="padding: 3px; border: 0px none;">12</th>
            <th style="padding: 3px; border: 0px none;">13</th>
        <tr>
            <td style="padding: 3px 6px; border: 0px none;">Music</td>
            <td style="padding: 3px 6px; border: 0px none;">Followers</td>
            <td style="padding: 3px 6px; border: 0px none;">Following</td>
        </tr>
    </table> 
    
    <div class="introduction" style="width: 90%;margin:0 auto;text-align:center">
        <p>{{ $artist->introduction}}</p>
    </div>
    @endforeach
    
        <div class="col-12 music" style="border-top:solid 1px;overflow:auto;width:100%;height:350px;">
            <div class="row">
                @foreach($posts as $post)
                <div class="col-4"  style="padding: 0 0;">
                    <a href="{{ url('posts/show/'.$post->id) }}">
                    <img  src="{{asset('storage/uploads/'.$post->music_image)}}" style="width: 100%;">
                    </a>
                </div>
                @endforeach
            </div>
        </div>

    @extends('layouts.app_footer')
    
</body>
@endsection