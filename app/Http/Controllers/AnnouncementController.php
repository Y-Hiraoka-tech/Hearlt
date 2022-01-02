<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GiftMusic;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    public function show() {
        $gifteds = GiftMusic::with('post','user')->where('gifted_user_id',Auth::id())->get();
        $gifts = GiftMusic::with('post','gifted_user')->where('user_id', Auth::id())->get();
        // foreach($gifts as $gift){
        //     $gift->read = true;
        //     $gift->save();
        // }
        return view('musics.giftAnnouncement',compact('gifteds','gifts'));
    }
    public function read($id) {
        $announcement_read = GiftMusic::with('post')->where('id',$id)->first();
        $announcement_read->read = true;
        $announcement_read->save();
        return redirect()->route('mymusic.show',['id'=>$announcement_read->post->id]);
    }
}
