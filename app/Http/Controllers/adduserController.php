<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\User;


class adduserController extends Controller
{
    public function storeMyImg(Request $request)
    {
    //画像ファイルに名前をつけて指定ディレクトリに保存、変数に代入
    //postで受け取ったデータ（$request）の中にある myPic(ネーム属性)を、第二引数”ユーザーid＋日付.jpg”の名前で第一引数のディレクトリに保存
    if($request->file('user_image')){
        $file_path = $request->file('user_image')->store('public/uploads/');
        //ユーザーIDからユーザー情報を取得、変数に代入
        $user = User::find(auth()->id());

        //ユーザー情報からmy_picカラムのデータをピックアップし、
        //$filepathのファイル名の部分のみをmy_picカラムに代入
        $user->user_image = basename($file_path);
        //保存
        $user->save();
    }
    else{
        $user = User::find(auth()->id());
        $user->user_image = basename("ONZOprofile.png");
        $user->save();
    }
    if($request->username){
        $user = User::find(auth()->id());
        $user->username = $request->username;
        //保存
        $user->save();
    }
    if($request->introduction){
        $user = User::find(auth()->id());
        $user->introduction = $request->introduction;
        //保存
        $user->save();
    }
    

    return redirect()->route('home');
    }
}
