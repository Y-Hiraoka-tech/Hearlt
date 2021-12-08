<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Post;
use App\Models\UserToArtistsFollowing;
use Illuminate\Support\Facades\Auth;

class TopController extends Controller
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
    public function recommend(){
        $recommends = Post::with('artist')->inRandomOrder()->take(8)->get();
        return view('musics.recommend',compact('recommends'));
    }
    public function followingArtists(){
        $following_artists = Artist::inRandomOrder()->take(8)->get();
        return view('ruts.followingArtist',compact('following_artists'));
    }
}
