@extends('layouts.music')
@section('title', 'detail page')

@section('content')
@foreach($artists as $artist)
<body style="background: #272525;color:white;">
<div style="text-align: center;align-items: center;">
    <img src="{{asset('storage/uploads/'.$post->music_image)}}" style="display: block; margin: auto;width:80%;margin-top:10%;">
        <h1 class="card-text mt-4"style="font-size:30px;">{{ $post->name }} </h1>
        <h1 class="card-text"style="font-size:25px;color:red;">{{$artist->name}}</h1>
        <audio src="{{asset('storage/uploads/'.$post->music_file)}}" controls style="display: block; margin: auto;"></audio>
        <p class="card-text">ticket：{{ $post->music_ticket }}</p>
        <div class="card-text mt-4" style="display: block; margin: auto;width:70%;">
            <p>{{ $post->music_lylic }}</p>
        </div>
        <p>ボタンをタップしたら歌詞がmusicイメージのところに出るようにする</p>
        
</div>
</body>
@endforeach
@endsection