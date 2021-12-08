<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }
    public function edit($id)
    {
          // $usr_id = $post->user_id;
          $user = User::find($id);
          
          return view('user.edit',['user' => $user]);
          // return view('posts.edit');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

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
    public function destroy($id)
    {
        $user = \App\Models\User::find($id);
        //削除
        $user->delete();

        return redirect()->to('/editusers');
    }
}
