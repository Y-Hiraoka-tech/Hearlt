@extends('layouts.createaccount')

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
                    <h3 style="margin-bottom:20%;text-align: center;">管理者アカウントにログインする</h3>
                    <form method="POST" action="{{ route('admin.login') }}">
                        @csrf

                        <div class="form-group row">
                                <input id="email" type="email" class="block mt-1 w-full form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="名前" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                                <input id="password" type="password" class="block mt-1 w-full form-control @error('password') is-invalid @enderror" name="password" placeholder="パスワード" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>       
                        <div class="form-group row mb-0">
                        <button type="submit" class="btn btn-primary"  style="position: fixed;bottom:0;display:inline-block;width:100%;height:60px;text-align:center;background-color:#7B7575;">
                               ログインする
                        </button>

                                
                        </div>
                    </form>
                </div>
    </div>
</div>
@endsection