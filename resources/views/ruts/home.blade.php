@extends('layouts.home')
@section('content')
<body style="background: #272525;color:white;">
    <div class="contents">
	<p>持っている音楽</p>
    
    <p>フォロー中のアーティスト</p>
    @foreach($artists as $artist)
        <div class="col-4"  style="padding: 0 0;">
            <a href="{{ url($artist->id.'/top') }}">
                <img  src="{{asset('storage/uploads/'.$artist->artist_image)}}" style="width: 100%;">
            </a>
        </div>
    @endforeach
    <p>おすすめ</p>
    
    <div class="music" style="overflow-x:auto;scroll-snap-type: x;display:flex;">
                @foreach($posts as $post)
                        <a href="{{ url('/music/'.$post->id) }}" style="scroll-snap-align: start;">
                            <img  src="{{asset('storage/uploads/'.$post->music_image)}}" style="width:100px;margin-right:5px;">
                        </a>
                @endforeach
    </div>
    <p style="margin-top: 5%;">Gift可能な音楽
        <a href="{{ url('/gift/select/')}}" style="position: absolute;right:30px">もっと見る</a>
    </p>


     <div class="music" style="overflow-x:auto;scroll-snap-type: x;height:350px; display:flex;">
                @foreach($posts as $post)
                        <a href="{{ url('/gift/form/'.$post->id.'/form') }}" style="scroll-snap-align: start;">
                            <img  src="{{asset('storage/uploads/'.$post->music_image)}}" style="width:100px;margin-right:5px;">
                        </a>
                @endforeach
    </div>

    </div>
@extends('layouts.app_footer')
</body>
@endsection