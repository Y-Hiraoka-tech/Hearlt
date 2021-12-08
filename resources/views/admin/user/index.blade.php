@extends('layouts.app')
@section('title', 'User')

@section('content')
<div class="container mt-5">
<h2 class="mb-3">ユーザー管理</h2>
    <div class="row">
        <!-- メイン -->
        <div class="col-12">
            <table class="table">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <th>名前</th>
                        <th>ユーザーID</th>
                        <th>メールアドレス</th>
                        <th>電話番号</th>
                        <th>自己紹介</th>
                        <th>プロフィール画像</th>
                    </tr>
                    
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone}}</td>
                        <td>{{ $user->introduction }}</td>
                        <td><img src="{{asset('storage/uploads/'.$user->user_image)}}" style="width:100px"></td>
                        <td>
                        <a href="{{ url('editusers/edit/'.$user->id) }}" class="btn btn-dark">編集する</a>
                        @auth
                            <form action="/editusers/delete/{{$user->id}}" method="POST">
                                {{ csrf_field() }}
                                <input type="submit" value="削除する" class="btn btn-danger user_del_btn">
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