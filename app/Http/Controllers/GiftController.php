<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Ticket;
use App\Models\PurchaseHistory;
use App\Models\GiftMusic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\TicketPrice;
use GrahamCampbell\ResultType\Success;

class GiftController extends Controller
{
    public function show(Post $post)
    {
        $artist_id = Auth::id();
        $artists = DB::table('artists')->where('id',$artist_id)->get();
        $music_id = Auth::id();
        $posts = Post::all();
        return view('musics.giftselect', compact('artists','posts'));
    }

    public function form(Post $post, $id, Request $request)
    {
        //ifも使う
        
        $artists = DB::table('artists')->where('id',Auth::id())->get();
        $post = Post::find($id);
        return view('musics.giftform',compact('artists','post','request'));
    }

    public function userSelect(Request $request, $id)
    {
        $users = User::all();
        $post = Post::find($id);
        return view('musics.giftUserSelect',compact('users','post'));
    }

    public function userStore(Request $request, $id){
        $data = ['gifted_user_id'=>$request->gifted_user_id];
        $request->session()->flashInput(empty(old()) ? $data : old());
        return redirect()->route('gift.form.gifted',['id'=>$id]);
    }

    public function gift(Request $request, $id)
    {
        $gift = new GuftMusic();
        $gift->user_id = Auth::id();
        $gift->gifted_user_id = $request->gifted_user_id;
        $gift->music_id = $id;
        $gift->message = $request->message;
        $gift->lyric = $request->lyric;
        $gift->method = $request->method;
        $gift->save();
        
        return redirect()->to('/home');
    }

    public function purchase()
    {
        $ticketprices = TicketPrice::all();
        $id = Auth::id();
        $ticket_sum = Ticket::where('user_id',$id)->sum('tickets');
        return view('musics.purchase',compact('ticketprices','ticket_sum'));
    }
    public function store(Request $request)
    {
        // $id = Auth::id();
        // DB::table('users')->where('id',$id)->update(['tickets' => 2]);
        $id = Auth::id();
        $ticket = new Ticket();
        $ticket->user_id = $id;
        $ticket->tickets = $request->tickets;
        $ticket->save();

        $history = new PurchaseHistory();
        $history->user_id = $id;
        $history->ticket = $request->tickets;
        $ticketMoney = DB::table('TicketPrice')->where('ticket',$request->tickets)->first();
        $history->money = $ticketMoney->money;
        $history->success = 1;

        $history->save();

        return redirect()->to('/profile');
    }
}
