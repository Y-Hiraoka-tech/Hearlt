<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Artist;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Hash;

class ArtistRegisterController extends Controller
{
    public function create()
    {
        return view('auth.artistregister');
    }

    public function store(Request $request)
    {
        $id = Auth::id();
        $user = Artist::find($id);
        if($user){
            return redirect()->back()->withInput()->with('error','*複数のアカウントを作ることはできません。');
        }
        
        else{
            //インスタンス作成
        $artist = new Artist();
        $artist->name = $request->name;
        $artist->email = $request->email;
        $artist->password = Hash::make($request->password);
        $artist->phone = $request->phone;
        $artist->save();
        
        return redirect()->to('/register/artist/2');
        }
    }
    public function create2()
    {
        return view('auth.artistregister2');
    }

    public function store2(Request $request)
    {
        $artistsId = Auth::guard('artist')->id();
        $artist = Artist::find($artistsId);

    //画像ファイルに名前をつけて指定ディレクトリに保存、変数に代入
    //postで受け取ったデータ（$request）の中にある myPic(ネーム属性)を、第二引数”ユーザーid＋日付.jpg”の名前で第一引数のディレクトリに保存
    if($request->file('artist_image')){
        $file_path = $request->file('artist_image')->store('public/uploads/');
        //ユーザーIDからユーザー情報を取得、変数に代入
        $artist = Artist::find(auth()->id());

        //ユーザー情報からmy_picカラムのデータをピックアップし、
        //$filepathのファイル名の部分のみをmy_picカラムに代入
        $artist->artist_image = basename($file_path);
        //保存
        $artist->save();
    }
    else{
        $artist->artist_image = basename("ONZOprofile.png");
        $artist->save();
    }
    if($request->artistname){
        $artist->artistname = $request->artistname;
        //保存
        $artist->save();
    }
    if($request->introduction){
        $artist->introduction = $request->introduction;
        //保存
        $artist->save();
    }
        
    return redirect()->route('home');
    }
}
