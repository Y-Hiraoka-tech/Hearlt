@extends('layouts.recommend')
@section('content')
<body style="background: #272525;color:white;">
<div class="col-12" style="width:90%;margin:3rem auto 3rem auto;">
  <div class="row">
    @for ($i = 0; $i < 4; $i++)
      <div class="col-6 mt-3">
        <a href="{{ url('/music/'.$recommends[$i]->id) }}">
          <img  src="{{asset('storage/uploads/'.$recommends[$i]->music_image)}}" style="width:90%;">
          <div class="music-tittle text-center">
            <p style="font-size:17px;color: #D8D8D8;margin-bottom:0;">{{$recommends[$i]->name}}</p>
            <p style="font-size:12px;color: #ACA4A4;">{{$recommends[$i]->artist->name}}</p>
          </div>
        </a>
      </div>  
    @endfor        
  </div>
</div>
  
@extends('layouts.app_footer')
</body>
@endsection