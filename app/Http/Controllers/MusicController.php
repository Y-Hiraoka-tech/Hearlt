<?php

namespace App\Http\Controllers;

use App\Models\Post;

class MusicController extends Controller
{
    public function show($id)
    {
        $post = Post::with('artist')->where('id',$id)->first();
        return view('musics.music',compact('post'));
    }
}
