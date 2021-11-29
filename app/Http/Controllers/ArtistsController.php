<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\Post;
use App\Models\UserToArtistsFollowing;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ArtistsController extends Controller
{
    public function index(){
        $artist_id = Auth::id();
        $music_id = Auth::id();
        $posts = Post::with('artist')->get();
        $recommends = Post::inRandomOrder()->take(3)->get();
        $recommend_artist = Artist::where('id', $recommends[1]->artist_id)->value('name');
        $followed_artists_id = UserToArtistsFollowing::where('user_id',Auth::id())->pluck('following_artist_id');
        if(count($followed_artists_id) <= 3){
            $followed_artists = Artist::whereIn('id', $followed_artists_id)->get();
        }
        else{
            $followed_artists = Artist::whereIn('id', $followed_artists_id)->inRandomOrder()->take(3)->get();
        }
        return view('ruts.home', compact('posts','recommends','recommend_artist','followed_artists'));
    }

    public function show(Artist $artist)
    {
        $id = Auth::id();
        $artists = DB::table('artists')->where('id',$id)->get();
        return view('artist.top',compact('artists'));
    }

    public function profile()
    {
        $id = Auth::guard('artist')->id();
        $artists = DB::table('artists')->where('id',$id)->get();
        $posts = DB::table('posts')->where('artist_id',$id)->get();
        $posts->count = $posts->count();
        return view('ruts.artistprofile',compact('artists','posts'));
    }

}
