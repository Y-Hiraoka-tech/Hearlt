<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Artist;

class ArtistLoginController extends Controller
{
    public function loginView(){
        return view("artist.login");
    }
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $request->email = 
        $artist = Artist::where('email',$request->email)->first();
        if (Auth::guard('artist')->attempt($credentials)) {
            if($artist->user_id != Auth::guard('user')->id()){
                return redirect()->back()->with('error','*ログインしているユーザーアカウントに紐づいているアーティストアカウントをお使いください。');
            }
            else{
                return redirect()->intended('/profile/artist');
            }
            
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

    }
}