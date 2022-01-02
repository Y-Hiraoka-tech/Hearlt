<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Artist;
use App\Models\UserToArtistsFollowing;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Following;
use App\Models\GiftMusic;
use App\Models\Post;
use Illuminate\Contracts\Auth\Guard;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        $artists = Artist::all();
        return view('ruts.search',compact('users','artists'));
    }

    //自分のprofile欄のやつ
    public function show()
    {
        if(Auth::guard('artist')->check())
        {
            return redirect()->route('profile.artist');
        }
        else{
            $id = Auth::id();
            $users = DB::table('users')->where('id',$id)->get();
            $giftedmusics = GiftMusic::where('gifted_user_id',$id)->pluck('music_id');
            $posts = Post::whereIn('id',$giftedmusics)->get();
            $userfollowings = DB::table('followings')->where('user_id',$id)->where('status',1)->get();
            $artistfollowings = UserToArtistsFollowing::where('user_id',$id)->get();
            $followers = DB::table('followings')->where('following_user_id',$id)->where('status',1)->get();
            $userfollowings->count = count($userfollowings);
            $artistfollowings->count = count($artistfollowings);
            $followers->count = count($followers);
            $posts->count = count($posts);
            //通知機能
            // $send_announcement = GiftMusic::where('read',false)->where('user_id',$id)->get();
            // $send_announcement->count = count($send_announcement);
            $receive_announcement = GiftMusic::where('read',false)->where('gifted_user_id',$id)->get();
            $receive_announcement->count = count($receive_announcement);
            return view('ruts.profile',compact('users','posts','giftedmusics','userfollowings','artistfollowings','followers','receive_announcement'));
        }
    }

    public function search(Request $request) {
        $name_keyword = $request->input('name');
        $artist_keyword = $request->input('artist');
        $music_keyword = $request->input('music');
        if(!empty($name_keyword)) {
            $users= User::where('username', 'like', '%'.$name_keyword.'%')->get();
            $message = "「". $name_keyword."」を含む名前の検索が完了しました。";
            return view('ruts.searchresult', compact('users','message'));
        }
        elseif(!empty($artist_keyword)) {
            $artists = Artist::where('name', 'like', '%'.$artist_keyword.'%')->get();
            $message = "「". $artist_keyword."」を含む名前の検索が完了しました。";
            return view('ruts.searchresult', compact('artists','message'));
        }
        elseif(!empty($music_keyword)) {
            $musics = Post::with('artist')->where('name', 'like', '%'.$music_keyword.'%')->get();
            $message = "「". $music_keyword."」を含む名前の検索が完了しました。";
            return view('ruts.searchresult', compact('musics','message'));
        }
        else{
            $message = "検索結果はありません。";
            return view('ruts.searchresult', compact('message'));
        }
    }

    public function music($id){
        $post = Post::where('id',$id)->first();
        $artist = Artist::where('id',$post->artist_id)->first();
        $giftedmusic = GiftMusic::with('user','gifted_user')->where('gifted_user_id',Auth::id())->where('music_id',$id)->first();
        return view('ruts.mymusic',compact('post','artist','giftedmusic'));
    }


 }

