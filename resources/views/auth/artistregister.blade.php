]@extends('layouts.createaccount')

@section('content')
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Turret+Road&display=swap" rel="stylesheet">



<div class="container">
    <div class="logo py-4" style="text-align: center;">
        <h1 style="font-family: 'Turret Road', cursive;font-size:40px;">ONZO</h1>
        <img src="{{asset('storage/uploads/ONZO.png')}}" style="height: 150px;">
    </div>
    
    <div class="body"> 
        <div class="row justify-content-center">
            <div class="col-8">
                <h3 style="text-align: center;">アーティストアカウント情報を登録</h3>
                @if (session('error')) 
                    <div style="color: red;font-size:15px">{{ session('error') }}</div>
                @endif
 
                <form method="POST" action="/register/artist/store">
                        @csrf
                    <div class="form-group row" style="margin-top: 20%;">
                                <input id="name" type="text" class="block mt-1 w-full form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="名前" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group row">
                                <input id="email" type="email" class="block mt-1 w-full form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="メールアドレス" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="form-group row">
                                <input id="phone" type="text" class="block mt-1 w-full　form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="電話番号"　required autocomplete="phone">
                        
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="form-group row">
                                <input id="password" type="password" class="block mt-1 w-full form-control @error('password') is-invalid @enderror" name="password" placeholder="パスワード" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="form-group row">
                                <input id="password-confirm" type="password" class="block mt-1 w-full form-control" name="password_confirmation" placeholder="パスワード確認" required autocomplete="new-password">
                    </div>
                </div>
            </div>
                        <div class="form-group row">
                                <button type="submit" class="btn btn-primary"  style="margin-top:20%;display:block;width:100%;height:60px;text-align:center;background-color:#7B7575;">
                                    アカウントを作成する
                                </button>
                        </div>
                        <p style="text-align: center;font-family: 'Turret Road', cursive;font-size:30px;">or</p>
                </form>

                    <form action="{{ route('artist.login') }}">
                    <div class="form-group row">
                        <button class="mt-0" style="display:block;width:100%;height:60px;text-align:center;background-color:#F16D0E;">
                                    ログインする
                        </button>  
                    </div>
                    </form>
                </div>
</div>
@endsection