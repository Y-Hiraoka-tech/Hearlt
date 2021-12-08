@extends('layouts.search')
@section('content')
<body style="background: #272525;color:white;">
<form action="{{ url('searchresult')}}" method="post">
        {{ csrf_field()}}
        {{method_field('get')}}
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="user-tab" data-toggle="tab" href="#user" role="tab" aria-controls="user" aria-selected="true">USER</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="artist-tab" data-toggle="tab" href="#artist" role="tab" aria-controls="artist" aria-selected="false">ARTIST</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="music-tab" data-toggle="tab" href="#music" role="tab" aria-controls="music" aria-selected="false">MUSIC</a>
            </li>
        </ul>
        <div class="tab-content mt-3"style="margin:0 auto;width: 90%;">
            <div class="form-group tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="user-tab">
                <label>User検索</label>
                <input type="text" class="form-control col-md-5" placeholder="検索したいユーザー名を入力してください" name="name">
            </div>
            <div class="form-group tab-pane fade" id="artist" role="tabpanel" aria-labelledby="artist-tab">
                <label>Artist検索</label>
                <input type="text" class="form-control col-md-5" placeholder="検索したいアーティスト名を入力してください" name="artist">
            </div>
            <div class="form-group tab-pane fade" id="music" role="tabpanel" aria-labelledby="music-tab">
                <label>曲検索</label>
                <input type="text" class="form-control col-md-5" placeholder="検索したい曲名を入力してください" name="music">
            </div>
            <button type="submit" class="btn btn-primary" style="display:none">検索</button>
        </div>
    </form>
    <div style="margin: 2rem auto 4rem auto;width:90%;">
    @if(isset($users))
    <h5>ユーザー検索結果</h5>
    @foreach($users as $user)
        <div style="display:flex; padding-top:1rem;">
            <a href="{{ url('/follow/user/'.$user->id) }}" style="display: flex;color:white;">
                <img src="{{asset('storage/uploads/'.$user->user_image)}}" style="width:50px;height:auto;border-radius:50%;vertical-align:middle;">
                <p style="margin:auto auto auto 1rem;">{{$user->username}}</p>
            </a>
        </div> 
    @endforeach
    @endif
    @if(isset($artists))
    <h5>アーティスト検索結果</h5>
    @foreach($artists as $artist)
        <div style="display:flex; padding-top:1rem;">
            <a href="{{ url('/follow/artist/'.$artist->id) }}" style="display: flex;color:white;">
                <img src="{{asset('storage/uploads/'.$artist->artist_image)}}" style="width:50px;height:auto;border-radius:50%;vertical-align:middle;">
                <p style="margin:auto auto auto 1rem;">{{$artist->name}}</p>
            </a>
        </div>
    @endforeach
    @endif
    @if(isset($musics))
    <h5>曲検索結果</h5>
    @foreach($musics as $music)
        <div style="display:flex; padding-top:1rem;">
            <a href="{{ route('music',['id' => $music->id]) }}" style="display: flex;color:white;">
                <img src="{{asset('storage/uploads/'.$music->music_image)}}" style="width:50px;height:auto;vertical-align:middle;">
                <div style="margin:auto auto auto 1rem;">
                    <p style="margin-bottom:0;">{{$music->name}}</p>
                    <p style="margin-bottom:0;">{{$music->artist->name}}</p>
                </div>      
            </a>
        </div>
    @endforeach
    @endif

    </div>
    @extends('layouts.app_footer')
</body>
@endsection
