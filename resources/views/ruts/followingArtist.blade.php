@extends('layouts.following_artists')
@section('content')
<body style="background: #272525;color:white;">
<div class="col-12" style="width:90%;margin:3rem auto 3rem auto;">
  <div class="row">
    @for ($i = 0; $i < 3; $i++)
      <div class="col-6">
        <a href="{{route('follow.artist',['id' => $following_artists[$i]->id]) }}">
          <img  src="{{asset('storage/uploads/'.$following_artists[$i]->artist_image)}}" style="width:90%; border-radius:50% ;margin:1rem">
          <div class="artists_content text-center">
            <p style="font-size:17px;color: #D8D8D8;margin-bottom:0;">{{$following_artists[$i]->name}}</p>
          </div>
        </a>
      </div>  
    @endfor        
  </div>
</div>
@extends('layouts.app_footer')
</body>
@endsection