<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Artist;
use App\Models\Post;
use App\Models\UserToArtistsFollowing;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Following;
use UserToArtistTable;

class FollowController extends Controller
{
    public function userprofile($id)
    {
        $users = DB::table('users')->where('id',$id)->get();
        $posts = DB::table('posts')->where('artist_id',$id)->get();
        $userfollowings = DB::table('followings')->where('user_id',$id)->where('status',1)->get();
        
        $artistfollowings = UserToArtistsFollowing::where('user_id',$id)->get();
        $followers = DB::table('followings')->where('following_user_id',$id)->where('status',1)->get();
        $userfollowings->count = count($userfollowings);
        $artistfollowings->count = count($artistfollowings);
        $followers->count = count($followers);
        $posts->count = count($posts);
        $userfollow = DB::table('followings')->where('user_id',Auth::id())->where('following_user_id',$id)->where('status',1)->exists();
        $userRequest = DB::table('followings')->where('user_id',Auth::id())->where('following_user_id',$id)->where('status',0)->exists();

        if(Auth::id() == $id){
            return view('ruts.profile',compact('users','posts','userfollowings','artistfollowings','followers'));
        }
        else{
            return view('user.userprofile',compact('users','posts','userfollowings','artistfollowings','followers','userfollow','userRequest'));
        }
        
        // }
        
    }
    public function artistprofile($id){
        $artists = Artist::find($id);
        $posts = Post::where('artist_id',$id)->get();
        $followers = UserToArtistsFollowing::where('following_artist_id',$id)->get();

        $posts->count = count($posts);
        $followers->count = count($followers);

        return view('artist.following',compact('artists','posts','followers'));
    }
    
    public function following($id){
        $user_id = Auth::id();
        $following = new Following();
        $following->user_id = $user_id;
        $following->following_user_id = $id;
        $PrivateUsers = DB::table('users')->where('private',1)->first();
        if($PrivateUsers){
            $following->status = 0;
        }
        $following->save();
        return redirect()->to('/follow/user/'.$id);
    }
    public function artistFollowing($id){
        $user_id = Auth::id();
        $following = new UserToArtistsFollowing();
        $following->user_id = $user_id;
        $following->following_artist_id = $id;
        $following->save();
        return redirect()->to('/follow/artist/'.$id);
    }

    public function unfollow($id){
        $following = Following::where('user_id',Auth::user()->id)->where('following_user_id',$id)->first();
        $following->delete();
        return redirect()->to('/follow/user/'.$id);
    }
    public function artistUnfollow($id){
        $following = UserToArtistsFollowing::where('user_id',Auth::user()->id)->where('following_artist_id',$id)->first();
        $following->delete();
        return redirect()->to('/follow/artist/'.$id);
    }

    public function requests()
    {
        $id = Auth::id();
        $requests = User::find($id)->followRequests()->get();
        return view('user.requests',['requests' => $requests]);
    }

    public function request($id)
    {
        $users = DB::table('users')->where('id',$id)->get();
        $posts = DB::table('posts')->where('artist_id',$id)->get();
        $followings = DB::table('followings')->where('user_id',$id)->where('status',1)->get();
        $followers = DB::table('followings')->where('following_user_id',$id)->where('status',1)->get();

        $followings->count = count($followings);
        $followers->count = count($followers);
        $posts->count = count($posts);

        return view('user.request',['users' => $users,'posts'=> $posts,'followings'=>$followings,'followers'=>$followers]);
    }

    public function allow($id){
        DB::table('followings')->where('user_id',$id)->where('following_user_id',Auth::user()->id)->update(['status' => 1]);
        return redirect()->to('/follow/requests');
        
        //なぜかsaveが効かず、上記のupdateを初めて使った。
        // $allow = ->first();
        // $allow->status = 1;
        // $allow->save();
    }

    public function block($id){
        DB::table('followings')->where('user_id',$id)->where('following_user_id',Auth::user()->id)->update(['status' => 2]);
        // $block = DB::table('followings')->where('user_id',$id)->where('following_user_id',Auth::user()->id)->first();
        // dd($block);

        // $block->delete();
        return redirect()->to('/follow/requests');
    }

}
