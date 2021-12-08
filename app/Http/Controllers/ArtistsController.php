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
