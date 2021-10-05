@extends('layouts.app')
@section('title', 'TOP page')

@section('content')
<div class="container">
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

                    </tr>
                    
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->artist_id }}</td>
                        <td>{{ $post->name }}</td>
                        <td>{{ $post->music_image }}</td>
                        <td>{{ $post->music_file }}</td>
                        <td>{{ $post->music_trial }}</td>
                        <td>{{ $post->music_lylic }}</td>
                        <td>{{ $post->music_ticket }}</td>

                        <td>
                            <a href="{{ url('posts/'.$post->id) }}" class="btn btn-success">詳細</a>
                        @auth
                            <form action="/posts/delete/{{$post->id}}" method="POST">
                                {{ csrf_field() }}
                                <input type="submit" value="削除" class="btn btn-danger post_del_btn">
                            </form>
                        @endauth
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table> 
        </div>
    </div>
</div>
@endsection