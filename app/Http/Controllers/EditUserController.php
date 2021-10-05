<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EditUser;
use App\Models\User;


class EditUserController extends Controller
{
    public function index()
    {
        $users = EditUser::all();
        return view('user.index', ['users' => $users]);
    }
    public function edit($id)
    {
          // $usr_id = $post->user_id;
          $user = User::find($id);
          
          return view('user.edit',['user' => $user]);
          // return view('posts.edit');
    }
    public function update(Request $request ,$id)
    {

        $user = User::find($id);
        $userimage_path = $request->file('user_image')->store('public/uploads/');
        $user->name = $request->name;
        $user->username = $request->username;
        $user->introduction = $request->introduction;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->user_image = basename($userimage_path);

        $user->save();
        return redirect()->to('/editusers');
    }

    public function destroy($id)
    {
        $user = \App\Models\User::find($id);
        //削除
        $user->delete();

        return redirect()->to('/editusers');
    }

}
