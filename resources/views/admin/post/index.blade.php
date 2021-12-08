@extends('layouts.app')
@section('title', 'Music')

@section('content')
<div class="mt-5">
  <h2 class="mb-3">楽曲管理</h2>
    <div class="row">
        <!-- メイン -->
        <div class="col-12">
            <table class="table">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <th>アーティストID</th>
                        <th>楽曲名</th>
                        <th>ジャケット写真</th>
                        <th>音源ファイル</th>
                        <th>トライアル音源ファイル</th>
                        <th>歌詞</th>
                        <th>チケット</th>
                        <th>アクション</th>
                    </tr>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->artist_id }}</td>
                        <td>{{ $post->name }}</td>
                        <td><img src="{{asset('storage/uploads/'.$post->music_image)}}" style="width:100px"></td>
                        <td><audio src="{{asset('storage/uploads/'.$post->music_file)}}" controls></audio></td>
                        <td><audio src="{{asset('storage/uploads/'.$post->music_trial)}}" controls></audio></td>
                        <td>{{ $post->music_lylic }}</td>
                        <td>{{ $post->music_ticket }}</td>
                        <td>
                            <a href="{{ url('posts/'.$post->id) }}" class="btn btn-success">詳細</a>
                            <form action="/posts/delete/{{$post->id}}" method="POST">
                                {{ csrf_field() }}
                            <input type="submit" value="削除" class="btn btn-danger post_del_btn">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table> 
        </div>
    </div>
</div>
@endsection