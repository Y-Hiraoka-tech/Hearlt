<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class AdminPostController extends Controller
{
    public function index(){
        $posts = Post::get();
        return view('admin.post.index', compact('posts'));
    }
    public function edit($id)
    {
          $post = Post::find($id);
          return view('posts.edit',compact('post'));
    }
    public function update(Request $request, $id)
    {
        $post = Post::where('id',$id)->first();   

        //$this->validate($request,Post::$rules);
        $image_path = $request->file('music_image')->store('public/uploads/');
        $file_path = $request->file('music_file')->store('public/uploads/');
        $trial_path = $request->file('music_trial')->store('public/uploads/');
   
        $post->name = $request->name;
        $post->music_image = basename($image_path);
        $post->music_file = basename($file_path);
        $post->music_trial = basename($trial_path);
        $post->music_lylic = $request->music_lylic;
        $post->music_ticket = $request->music_ticket;

        $post->save();
    
        return redirect()->to('profile');
    }
    public function destroy($id)
    {
        $post = Post::find($id);
        //削除
        $post->delete();

        return redirect()->to('profile');
    }
}
