@extends('layouts.app')
@section('title', 'Artist')

@section('content')
<div class="container mt-5">
<h2 class="mb-3">アーティスト管理</h2>
    <div class="row">
        <!-- メイン -->
        <div class="col-12">
            <table class="table">
                <tbody>
                    <tr>
                        <th>id</th>
                        <th>user_id</th>
                        <th>アーティストID</th>
                        <th>名前</th>
                        <th>メールアドレス</th>
                        <th>電話番号</th>
                        <th>自己紹介</th>
                        <th>プロフィール画像</th>
                        <th>アクション</th>
                    </tr>
                    
                    @foreach ($artists as $artist)
                    <tr>
                        <td>{{ $artist->id }}</td>
                        <td>{{ $artist->user_id }}</td>
                        <td>{{ $artist->artistname }}</td>
                        <td>{{ $artist->name }}</td>
                        <td>{{ $artist->email }}</td>
                        <td>{{ $artist->phone}}</td>
                        <td>{{ $artist->introduction }}</td>
                        <td><img src="{{asset('storage/uploads/'.$artist->artist_image)}}" style="width:100px"></td>
                        <td>０００</td>
                        <td>
                    </tr>
                    @endforeach
                </tbody>
            </table> 
        </div>
    </div>
</div>
@endsection