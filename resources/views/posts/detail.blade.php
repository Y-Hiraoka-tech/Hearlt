@extends('layouts.detail')
@section('title', 'detail page')
@section('content')
@foreach($artists as $artist)
@foreach($posts as $post)
    <nav style="display:flex; padding-top:3%;padding-left:2%;padding-bottom:10px;">
    <p style="margin-bottom: 0;"><img src="{{asset('storage/uploads/'.$artist->artist_image)}}" style="width:10%; border-radius:50%;vertical-align:middle;">
    <span style="margin-left: 3%;">{{$artist->artistname}}</span>
    </p>
    </nav>
    <div style="text-align: center;align-items: center;">
        <img src="{{asset('storage/uploads/'.$post->music_image)}}" style="display: block;width:100%;">
        <h1 class="card-text mt-4"style="font-size:30px;">{{ $post->name }} -Single</h1>
        <h1 class="card-text"style="font-size:25px;color:red;">{{$artist->name}}</h1>
        <audio src="{{asset('storage/uploads/'.$post->music_file)}}" controls style="display: block; margin: auto;"></audio>
        <p class="card-text">ticket：{{ $post->music_ticket }}</p>
        <div class="card-text mt-4" style="display: block; margin: auto;width:70%;">
        <p>{{ $post->music_lylic }}</p>
        </div>
                    @auth
                        <a href="{{ url('posts/edit/'.$post->id) }}" class="btn btn-dark">編集する</a>
                    @endauth
    </div>
@endforeach
@endforeach
@endsection