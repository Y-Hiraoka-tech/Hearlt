@extends('layouts.app')
@section('title', 'Gift')

@section('content')
<div class="container mt-5">
<h2 class="mb-3">楽曲送信管理</h2>
    <div class="row">
        <!-- メイン -->
        <div class="col-12">
            <table class="table">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <th>ユーザーID</th>
                        <th>GIFT先</th>
                        <th>楽曲ID</th>
                        <th>メッセージ</th>
                        <th>歌詞</th>
                        <th>GIFT方法</th>
                        <th>作成</th>
                    </tr>
                    
                    @foreach ($gifts as $gift)
                    <tr>
                        <td>{{ $gift->id }}</td>
                        <td>{{ $gift->user_id }}</td>
                        <td>{{ $gift->gifted_user_id }}</td>
                        <td>{{ $gift->music_id }}</td>
                        <td>{{ $gift->messege }}</td>
                        <td>{{ $gift->lyric }}</td>
                        <td>{{ $gift->method}}</td>
                        <td>{{ $gift->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table> 
        </div>
    </div>
</div>
@endsection