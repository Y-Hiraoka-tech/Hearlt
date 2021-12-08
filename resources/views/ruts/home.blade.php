@extends('layouts.home')
@section('content')
<body style="background: #272525;color:white;margin-top:5rem">
    <div class="container">
        <div class="recommend">
            <div class="contents-tittle mx-2 my-4" style="display: flex;">
                <h5>本日のおすすめ</h5>
                <div class="more ml-auto">
                    <a href="{{route('recommend.music')}}">▶︎もっとみる</a> 
                </div>
            </div>
            <div class="music" style="text-align: center;margin-bottom: 1rem;">
                <div class="row" style="display: inline-block;vertical-align: middle;width:100%">
                    <div class="col-3 ml-auto" style="display: inline-block;vertical-align: middle;">
                        <a href="{{ url('/music/'.$recommends[0]->id) }}" style="scroll-snap-align: start;">
                            <img  src="{{asset('storage/uploads/'.$recommends[0]->music_image)}}" style="width:100%;margin-right:1rem;">
                        </a>
                    </div>
                    <div class="col-4" style="display: inline-block;vertical-align: middle;">
                        <a href="{{ url('/music/'.$recommends[1]->id) }}" style="scroll-snap-align: start;">
                            <img  src="{{asset('storage/uploads/'.$recommends[1]->music_image)}}" style="width:100%;margin-right:1rem;display: inline-block;
                            vertical-align: middle;">
                        </a>
                    </div>
                    <div class="col-3 mr-auto" style="display: inline-block;vertical-align: middle;">
                        <a href="{{ url('/music/'.$recommends[2]->id) }}" style="scroll-snap-align: start;">
                            <img  src="{{asset('storage/uploads/'.$recommends[2]->music_image)}}" style="width:100%;display: inline-block; 
                            vertical-align: middle;">
                        </a>
                    </div>        
                </div>
            </div>
            <div class="music-tittle text-center">
                <p style="font-size:20px;color: #D8D8D8;margin-bottom:0;">{{$recommends[1]->name}}</p>
                <p style="color: #ACA4A4;">{{$recommend_artist}}</p>
            </div>
        </div>

        <div class="followed_artist" style="margin-top: 2rem;">
            <div class="contents-tittle mx-2 my-2" style="display: flex;">
                <h5>フォロー中のアーティスト</h5>  
            <div class="more ml-auto">
                <a href="{{route('following.artists')}}">▶︎もっとみる</a> 
            </div>
            </div>
            <div class="row">
                @foreach($followed_artists as $followed_artist)
                <div class="col-4">
                    <div style="text-align: center;">
                        <img  src="{{asset('storage/uploads/'.$followed_artist->artist_image)}}" style="width: 80% ;border-radius: 50%;margin-bottom: 1rem;">
                        <p>{{ $followed_artist->name }}</p>
                    </div>
                </div> 
                @endforeach
            </div>
        </div>
        <div class="gift_music" style="margin-top: 2rem;margin-bottom:5rem;">
            <div class="contents-tittle mx-2 my-2" style="display: flex;">
                <h5>ギフト可能な音楽</h5>
                <div class="more ml-auto">
                    <a href="{{ url('/gift/select/')}}">▶︎もっとみる</a> 
                </div> 
            </div>
            @foreach($posts as $post) 
            <div class="have-artist-set" style="display: flex;padding-bottom:.5rem;margin-bottom:0.5rem;border-bottom:1px solid white">
            <a href="{{ url('/gift/form/'.$post->id.'/form') }}" style="width:100%">
                <div class="row">
                    <div class="col-2" style="margin:auto auto;">
                        <img  src="{{asset('storage/uploads/'.$post->music_image)}}" style="width: 100%;height:auto;">
                    </div>
                    <div class="col-10 mr-auto" style="margin:auto 0; display:flex">
                        <div class="have-artist-set-content mr-auto">
                            <p style="font-size: 16px;color:white;margin-bottom:0;">{{$post->name}}</p>
                            <p style="color: #7B7575;margin-bottom:0;">{{$post->artist->name}}</p>
                        </div>
                        <div class="have-artist-set-svg ml-auto" style="display: flex;margin:auto 0;">
                            <svg width="30" height="43" viewBox="0 0 30 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M28.0981 14.433H0.5V42.233H28.0981V14.433Z" stroke="white"/>
                            <path d="M8 22.305H10.047C11.151 22.305 12.047 21.41 12.047 20.305V3.13398C12.047 1.67298 13.564 0.705016 14.889 1.32002L27.843 7.33698C28.548 7.66498 29 8.37301 29 9.15101V10.319C29 11.793 27.461 12.76 26.133 12.122L20.167 9.253C18.84 8.615 17.301 9.58204 17.301 11.056V31C17.301 32.105 16.405 33 15.301 33H8C6.895 33 6 32.105 6 31V24.305C6 23.201 6.895 22.305 8 22.305Z" stroke="white"/>
                            </svg>
                        </div>    
                    </div>
                </div>
            </a>      
            </div>
            @endforeach 
        </div> 
    </div> 
</body>
@extends('layouts.app_footer')
@endsection