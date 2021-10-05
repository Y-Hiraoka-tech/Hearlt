@extends('layouts.app')

@section('title', 'edit page')
@section('content')
    <div class="row">
        <!-- メイン -->
        <div class="col-10 col-md-6 offset-1 offset-md-3">
            <div class="card">
                <form action="{{ route('post.update',$post->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <p class="card-text">
                    
                    <input type="text" class="name-control" name="name" value="{{$post->name}}">

                    <p>変更前ファイル：</p>
                    <audio src="{{asset('storage/uploads/'.$post->music_file)}}" controls style="display: block; margin: auto;"></audio>
                    <p>変更後ファイル：<audio id="preview" src="" controls style=" margin: auto;"></audio></p>
                    <input type="file" name="music_file" onchange="previewImage(this);"/>

                    <p>変更前ファイル：</p>
                    <audio src="{{asset('storage/uploads/'.$post->music_trial)}}" controls style="display: block; margin: auto;"></audio>
                    <p>変更後ファイル：<audio id="preview1" src="" controls style=" margin: auto;"></audio></p>
                    <input type="file" name="music_trial" onchange="previewImage1(this);"/>

                    <p>変更前ファイル：</p>
                    <img src="{{asset('storage/uploads/'.$post->music_image)}}" style="display: block; margin: auto;width:70%;">
                    <p>変更後ファイル：<img id="preview2" src="" style="max-width:200px;"></p>
                    <input type="file" name="music_image" accept="image/png, image/jpeg" onchange="previewImage2(this);"/>

                    <textarea class="form-control" name="music_lylic" id="exampleFormControlTextarea1" rows="3">{{$post -> music_lylic}}</textarea>
                    <select class="ticket-select" name="music_ticket" value="{{asset('storage/uploads/'.$post->music_ticket)}}">
                    <option value="{{$post->music_ticket}}">{{$post->music_ticket}}枚</option>
                    <option value="">ギフト券使用枚数</option>
                    <option value="1">１枚</option>
                    <option value="2">２枚</option>
                    <option value="3">３枚</option>
                    </select>
                    </p>
                    <div class="text-center mt-3">
                        <input name="post_id" type="hidden" value="{{$id ?? '' }}" >
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
    function previewImage1(obj)
    {
        var fileReader = new FileReader();
        fileReader.onload = (function() {
            document.getElementById('preview1').src = fileReader.result;
        });
        fileReader.readAsDataURL(obj.files[0]);
    }
    function previewImage2(obj)
    {
        var fileReader = new FileReader();
        fileReader.onload = (function() {
            document.getElementById('preview2').src = fileReader.result;
        });
        fileReader.readAsDataURL(obj.files[0]);
    }
    </script>
@endsection