<?php

namespace App\Http\Controllers;

use App\Models\Post;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MusicController extends Controller
{
    public function show(Post $post)
    {
        $id = Auth::id();
        $artists = DB::table('artists')->where('id',$id)->get();
        $post = Post::find($id);
        return view('musics.music',compact('artists','post'));
    }
}
