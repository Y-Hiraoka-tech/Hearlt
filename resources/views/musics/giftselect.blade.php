@extends('layouts.gift')
@section('content')
<body style="background: #272525;color:white;">
    <div class="contents">

        <div class="music" style="text-align:center; margin-top:15%">
                    @foreach($posts as $post)
                            <a href="{{ url('/gift/form/'.$post->id.'/form') }}" style="scroll-snap-align: start;">
                                <img  src="{{asset('storage/uploads/'.$post->music_image)}}" style="width:150px;height:150px;">
                            </a>
                            <p style="margin-top: 8px;margin-bottom:0;">{{ $post->name }}</p>
                            @foreach($artists as $artist)
                            <p style="color:#7B7575;">{{ $artist->name }}</p>
                            @endforeach
                    @endforeach
        </div>

    </div>
@extends('layouts.app_footer')
</body>
@endsection