@extends('layouts.createaccount')

@section('content')

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Turret+Road&display=swap" rel="stylesheet">

<div class="container col-8 py-4">
<form action="">

</form>
    <form action="{{ route('register.2') }}" method="post" enctype="multipart/form-data">
        <div class="uploadimg" style="text-align: center;">
                <input id="username" type="text" class="block mt-1 w-full form-control @error('name') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="ユーザーID" required autocomplete="username" autofocus>
            <label>
            <img id="preview" src="{{asset('storage/uploads/ONZOprofile.png')}}" style="max-width:200px;margin-bottom:5%;">
            <input type="file" name="user_image" accept="image/png, image/jpeg" onchange="previewImage(this);" hidden/>
            <p style="color:blue;">プロフィール写真を登録</p>
            </label>
            <input id="introduction" type="textarea" class="block mt-1 w-full form-control @error('name') is-invalid @enderror" name="introduction" value="{{ old('introduction') }}" placeholder="自己紹介" required autocomplete="introduction" autofocus>
        </div>

        <div class="text-center mt-3">
            <button type="submit" class="btn btn-primary"  style="margin-top:20%;display:block;width:100%;height:60px;text-align:center;background-color:#F16D0E;">
                登録する
            </button>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
        </div>
        
    </form>
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