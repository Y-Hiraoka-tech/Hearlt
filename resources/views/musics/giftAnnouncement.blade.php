@extends('layouts.header')
@section('title', 'Notion')
@section('content')
<body class="container"style="background: #272525;color:white;">
    <p class="mt-3">送信</p>
    @if($gifts->isEmpty())
    <div class="text-center">
      <img src="{{asset('storage/default/music_icon.svg')}}" style="width:100px">
      <p style="color: white;margin-top:1rem">友達に音楽を送ってあげよう！</p>
    </div>
    @else
    @foreach($gifts as $gift)
        <div style="margin-top:1rem;">
          <div style="display:flex;align-items: center;">
              <img src="{{asset('storage/uploads/'.$gift->gifted_user->user_image)}}" alt="" style="border-radius: 50%; width:40px;">
              <div class="mx-2">
                <span style="font-size:12px;">あなたは{{ $gift->gifted_user->username }}に楽曲を送りました。</span>
                <span style="font-size:12px;font-weight:bold">「{{ $gift->message }}」</span>
              </div>
              <img src="{{asset('storage/uploads/'.$gift->post->music_image)}}" alt="" style="width: 40px;margin-left:auto">
          </div>
            <p class="text-right" style="font-size:10px" >{{$gift->created_at}}</p>
        </div>
      @endforeach
    @endif

    @if($gifteds->isEmpty())
    @else
    <p class="mt-3">受信</p>
        @foreach($gifteds as $gifted)
        <a href="{{ route('announcement.read',['id'=>$gifted->id ])}}" style="color: white;">
          <div style="margin-top:1rem;">
            <div style="display:flex;align-items: center;">          
                <img src="{{asset('storage/uploads/'.$gifted->user->user_image)}}" alt="" style="border-radius: 50%; width:40px;">
                <div class="mx-2">
                  <span style="font-size:12px;">{{ $gifted->user->username }}があなたに楽曲を送りました。</span>
                  <span style="font-size:12px;font-weight:bold">「{{ $gifted->message }}」</span>
                </div>
                <img src="{{asset('storage/uploads/'.$gifted->post->music_image)}}" alt="" style="width: 40px;margin-left:auto">
            </div>
              <p class="text-right" style="font-size:10px" >{{$gifted->created_at}}</p>
          </div>
        </a>
        @endforeach
    @endif
   
@extends('layouts.app_footer')
</body>
@endsection