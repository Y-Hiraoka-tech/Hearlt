@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="container" style="margin:3rem">
  <h2>ダッシュボード</h2>
  <div class="row mt-3" >
    <a href="{{route('admin.user.index')}}" class="admin-item col-4 text-center" style="border:1px solid #808080; padding:2rem;">
      <i class="fas fa-users fa-4x" style="margin-top: 20px;"></i>
      <p class="mt-3">ユーザー管理</p>
    </a>
    <a href="{{route('admin.artist.index')}}" class="admin-item col-4 text-center" style="border:1px solid #808080; padding:2rem;">
      <img src="{{asset('storage/default/artist_icon.svg')}}" style="width: 70px;color:white">
      <p class="mt-3">アーティスト管理</p>
    </a>
    <a href="{{route('admin.music.index')}}" class="admin-item col-4 text-center" style="border:1px solid #808080; padding:2rem;">
      <i class="fas fa-music fa-4x" style="margin-top: 20px;"></i>
      <p class="mt-3">楽曲管理</p>
    </a>
  </div>
  <div class="row">
    <a href="{{route('admin.follow.index')}}" class="admin-item col-4 text-center" style="border:1px solid #808080; padding:2rem;">
      <i class="fas fa-user-friends fa-4x" style="margin-top: 20px;"></i>
      <p class="mt-3">フォロー管理</p>
    </a>
    <a href="{{route('admin.gift.index')}}" class="admin-item col-4 text-center" style="border:1px solid #808080; padding:2rem;">
    <i class="fas fa-gift fa-4x" style="margin-top: 20px;"></i>
      <p class="mt-3">楽曲送信管理</p>
    </a>
    <a href="{{route('admin.ticket.index')}}" class="admin-item col-4 text-center" style="border:1px solid #808080; padding:2rem;">
    <i class="fas fa-ticket-alt fa-4x" style="margin-top: 20px;"></i>
      <p class="mt-3">チケット管理</p>
    </a>
  </div>
</div>
<style>
  a.admin-item{
    color: black;
  }
  a.admin-item:hover{
    background-color: #f79428;
    color: black;
  }
</style>
@endsection