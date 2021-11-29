@extends('layouts.setting')
@section('content')
<body style="background: #272525;color:white;">
    <div class="row">
        <!-- メイン -->
        <div class="col-8 mx-auto">
            <div class="form-title" style="margin: 2rem 0 1rem 0;">
                <h5>プロフィール編集</h5>
            </div>
            <form action="{{ route('account.update',$user->id) }}" method="post" enctype="multipart/form-data" style="background: #272525;color:white;">
            {{ csrf_field() }}
                <div  class="form-image mx-auto" style="width: 60%;">
                    <label>
                        <img id="preview" src="{{asset('storage/uploads/'.$user->user_image)}}" style="width:100%;">
                        <input type="file" name="user_image" accept="image/png, image/jpeg" onchange="previewImage(this);" hidden/>
                    </label>
                </div>
                <div class="form-body mt-4">
                    <div style="margin-bottom: 3%;">
                        <p style="margin-bottom: 0;">名前</p>
                        <input type="text" class="name-control" name="name" value="{{$user->name}}" style="background-color:#7B7575;width:100%;border-radius:10px;" >
                    </div>
                    <div style="margin-bottom: 3%;">
                        <p style="margin-bottom: 0;">ユーザーネーム</p>
                        <input type="text"  class="username-control" name="username" value="{{$user->username}}" style="background-color:#7B7575;width:100%;border-radius:10px;">
                    </div>
                    <div style="margin-bottom: 3%;">
                        <p style="margin-bottom: 0;">email</p>
                        <input type="text"  class="email-control" name="email" value="{{$user->email}}" style="background-color:#7B7575;width:100%;border-radius:10px;" readonly>
                    </div>
                    <div style="margin-bottom: 3%;">
                        <p style="margin-bottom: 0;">電話番号</p>
                        <input type="text" class="phone-control" name="phone" value="{{$user->phone}}" style="background-color:#7B7575;width:100%;border-radius:10px;">
                    </div>
                    <div style="margin-bottom: 3%;">
                        <p style="margin-bottom: 0;">自分紹介</p>
                        <input type="textarea" class="introduction-control" name="introduction" value="{{$user->introduction}}"style="background-color:#7B7575;width:100%;border-radius:10px;">
                    </div>

                    <div class="text-center mt-3">
                        <input name="post_id" type="hidden" value="{{$id ?? ''}}" >
                        <input class="btn" type="submit" value="変更する" style="background-color: #F16D0E;color:white;">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
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
@extends('layouts.app_footer')
@endsection