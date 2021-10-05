<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EditArtistAccountController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $artists = DB::table('artists')->where('id',$id)->get();
        return view('ruts.artistprofile-edit',['artists' => $artists]);
    }
    public function edit($id)
    {
          // $usr_id = $post->user_id;
          $user = User::find($id);
          
          return view('ruts.editaccount',['user' => $user]);
          // return view('posts.edit');
    }
    public function update(Request $request)
    {
        $user = User::find(auth()->id());

        if($request->file('user_image')){
            $file_path = $request->file('user_image')->store('public/uploads/');
            $user->user_image = basename($file_path);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->username = $request->username;
        if($request->introduction){
            $user->introduction = $request->introduction;
            $user->save();
        }
        $user->save();

        return redirect()->to('/setting');
    }
}
