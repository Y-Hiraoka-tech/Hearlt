@extends('layouts.setting')
@section('content')
    <div class="row">
        <!-- メイン -->
        <div class="col-10 col-md-6 offset-1 offset-md-3">
            <div class="card">
                <form action="{{ route('account.update',$user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <p class="card-text">
                    <input type="text" class="name-control" name="name" value="{{$user->name}}">
                    <input type="text" class="username-control" name="username" value="{{$user->username}}">
                    <input type="text" class="email-control" name="email" value="{{$user->email}}">
                    <input type="text" class="phone-control" name="phone" value="{{$user->phone}}">
                    <input type="textarea" class="introduction-control" name="introduction" value="{{$user->introduction}}">
                    <p>変更前ファイル：</p>
                    <img src="{{asset('storage/uploads/'.$user->user_image)}}" style="display: block; margin: auto;width:70%;">
                    <p>変更後ファイル：<img id="preview" src="" style="max-width:200px;"></p>
                    <input type="file" name="user_image" accept="image/png, image/jpeg" onchange="previewImage(this);"/>
                    </p>
                    <div class="text-center mt-3">
                        <input name="post_id" type="hidden" value="{{$id ?? ''}}" >
                        <input class="btn btn-primary" type="submit" value="変更する">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script>
    function previewImage(obj)
    {
        var fileReader = new FileReader();
        fileReader.onload = (function() {
            document.getElementById('preview').src = fileReader.result;
        });
        fileReader.readAsDataURL(obj.files[0]);
    }
    </script>
@endsection