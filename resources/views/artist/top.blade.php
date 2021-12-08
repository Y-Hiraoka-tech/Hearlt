
@extends('layouts.artist_top')
@section('content')
    @foreach($artists as $artist)
        <nav style="display:flex; padding-top:3%;padding-left:2%;padding-bottom:10px;">
        <span style="margin-left: 3%;">{{$artist->name}}</span>
        </nav>
    @endforeach
@endsection