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
        if($this->middleware('artist')){
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

            // $giftedmusics = GiftMusic::where('gifted_user_id',$id)->get();
            // $mymusics->messege = GiftMusic::where('gifted_user_id',$id)->pluck('messege');
            // dd($mymusics->messege);

            return view('ruts.profile',compact('users','posts','giftedmusics','userfollowings','artistfollowings','followers'));
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

        // if(!empty($keyword_name) && empty($keyword_username)) {
        //     $query = User::query();
        //     $users = $query->where('name','like', '%' .$keyword_name. '%')->get();
        //     $message = "「". $keyword_name."」を含む名前の検索が完了しました。";
        //     return view('ruts.searchresult')->with([
        //       'users' => $users,
        //       'message' => $message,
        //     ]);
        // }
        // elseif(empty($keyword_name) && !empty($keyword_username)) {
        //     $query = User::query();
        //     $users = $query->where('username','like', '%' .$keyword_username. '%')->get();
        //     $message = "「". $keyword_username."」を含む名前の検索が完了しました。";
        //     return view('ruts.searchresult')->with([
        //       'users' => $users,
        //       'message' => $message,
        //     ]);
        // }
        // else {
        //     if(!empty($keyword_name) && empty($keyword_artistname)) {
        //         $query = Artist::query();
        //         $artists = $query->where('name','like', '%' .$keyword_name. '%')->get();
        //         $message = "「". $keyword_name."」を含む名前の検索が完了しました。";
        //         return view('ruts.searchresult')->with([
        //           'artists' => $artists,
        //           'message' => $message,
        //         ]);
        //      }
        //     elseif(empty($keyword_name) && !empty($keyword_artistname)) {
        //           $query = Artist::query();
        //           $artists = $query->where('artistname','like', '%' .$keyword_artistname. '%')->get();
        //           $message = "「". $keyword_username."」を含む名前の検索が完了しました。";
        //           return view('ruts.searchresult')->with([
        //           'artists' => $artists,
        //           'message' => $message,
        //           ]);
        //   }
  
  
        //       $message = "検索結果はありません。";
        //       return view('ruts.searchresult')->with('message',$message);
        // }
    }
 }

