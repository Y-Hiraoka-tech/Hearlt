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

        // $giftedmusics = GiftMusic::where('gifted_user_id',$id)->get();
        // $mymusics->messege = GiftMusic::where('gifted_user_id',$id)->pluck('messege');
        // dd($mymusics->messege);

        return view('ruts.profile',compact('users','posts','giftedmusics','userfollowings','artistfollowings','followers'));
    }

    public function search(Request $request) {
        $keyword_name = $request->name;
        $keyword_username = $request->username;
        if(!empty($keyword_name) && empty($keyword_username)) {
            $query = User::query();
            $users = $query->where('name','like', '%' .$keyword_name. '%')->get();
            $message = "「". $keyword_name."」を含む名前の検索が完了しました。";
            return view('ruts.searchresult')->with([
              'users' => $users,
              'message' => $message,
            ]);
        }
        elseif(empty($keyword_name) && !empty($keyword_username)) {
            $query = User::query();
            $users = $query->where('username','like', '%' .$keyword_username. '%')->get();
            $message = "「". $keyword_username."」を含む名前の検索が完了しました。";
            return view('ruts.searchresult')->with([
              'users' => $users,
              'message' => $message,
            ]);
        }
        else {
            $message = "検索結果はありません。";
            return view('ruts.searchresult')->with('message',$message);
        }
    }
}
