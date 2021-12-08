@extends('layouts.app')
@section('title', 'Artist')

@section('content')
<div class="container mt-5">
<h2 class="mb-3">フォロー管理</h2>
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="user-tab" data-toggle="tab" href="#user" role="tab" aria-controls="user" aria-selected="true">USER</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="artist-tab" data-toggle="tab" href="#artist" role="tab" aria-controls="artist" aria-selected="false">ARTIST</a>
            </li>
        </ul>

        <div class="tab-content mt-3"style="margin:0 auto;width: 90%;">
            <div class="form-group tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="user-tab">
                <label>User</label>
                <div class="row">
                  <div class="col-12">
                      <table class="table">
                          <tbody>
                              <tr>
                                  <th>id</th>
                                  <th>ユーザーID</th>
                                  <th>フォロー相手</th>
                                  <th>ステータス</th>
                                  <th>作成</th>
                                  <th>アップデート</th>
                                  <th>アクション</th>
                              </tr>
                              
                              @foreach ($user_followings as $user_following)
                              <tr>
                                  <td>{{ $user_following->id }}</td>
                                  <td>{{ $user_following->user_id }}</td>
                                  <td>{{ $user_following->following_user_id }}</td>
                                  <td>{{ $user_following->status }}</td>
                                  <td>{{ $user_following->created_at }}</td>
                                  <td>{{ $user_following->updated_at}}</td>
                                  <td>０００</td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table> 
                  </div>
              </div>
                
            </div>
            <div class="form-group tab-pane fade" id="artist" role="tabpanel" aria-labelledby="artist-tab">
                <label>Artist</label>
                <div class="row">
                  <div class="col-12">
                      <table class="table">
                          <tbody>
                              <tr>
                                  <th>id</th>
                                  <th>ユーザーID</th>
                                  <th>フォロー相手</th>
                                  <th>ステータス</th>
                                  <th>作成</th>
                                  <th>アップデート</th>
                                  <th>アクション</th>
                              </tr>
                              
                              @foreach ($artist_followings as $artist_following)
                              <tr>
                                  <td>{{ $artist_following->id }}</td>
                                  <td>{{ $artist_following->user_id }}</td>
                                  <td>{{ $artist_following->following_artist_id }}</td>
                                  <td>{{ $artist_following->status }}</td>
                                  <td>{{ $artist_following->created_at }}</td>
                                  <td>{{ $artist_following->updated_at }}</td>
                                  <td>０００</td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table> 
                  </div>
              </div>
            </div>
        </div>
</div>
@endsection