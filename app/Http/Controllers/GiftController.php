<?php

namespace App\Http\Controllers;

use App\Models\Artist;
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

    public function form($id)
    {
        $value = session('gifted_user_id');
        $user = User::where('id',$value)->first();
        // dd($user);
        // $username = $user->name;
        $artists = DB::table('artists')->where('id',Auth::id())->get();
        $post = Post::find($id);
        return view('musics.giftform',compact('artists','post','value','user'));
    }

    public function userSelect(Request $request, $id)
    {
        $users = User::all();
        $post = Post::find($id);
        return view('musics.giftUserSelect',compact('users','post'));
    }

    public function userStore(Request $request, $id){
        $request->session()->put('gifted_user_id',$request->gifted_user_id);
        return redirect()->route('gift.form',['id'=>$id]);
    }

    public function music(Request $request, $id)
    {
        $ticket_sum = Ticket::where('user_id',Auth::id())->sum('tickets');
        $ticket = Ticket::where('user_id',Auth::id())->first();
        
        $music_ticket = Post::where('id',$id)->value('music_ticket');
        if($ticket_sum > $music_ticket){
            $ticket->tickets = $ticket->tickets-$music_ticket;
            $ticket->save();
            if($ticket->tickets < 0){
                $minusticket = abs($ticket->tickets);
                Ticket::where('user_id',Auth::id())->where('tickets','<','0')->delete();
                $nextticket = Ticket::where('user_id',Auth::id())->first();
                $nextticket->tickets = $nextticket->tickets-$minusticket;
                $nextticket->save();
            }
        }
        else{
            return redirect()->route('purchase.gift');
        }
        $gift = new GiftMusic();
        $gift->user_id = Auth::id();
        $gift->gifted_user_id = $request->gifted_user_id;
        $gift->music_id = $id;
        $gift->messege = $request->message;
        $gift->lyric = $request->lyric;
        $gift->method = $request->method;
        $gift->save();
        return redirect()->route('home');
    }

    public function myMusic($id){
        $post = Post::where('id',$id)->first();
        $artist = Artist::where('id',$post->artist_id)->first();
        $giftedmusic = GiftMusic::where('gifted_user_id',Auth::id())->where('music_id',$id)->first();
        return view('ruts.mymusic',compact('post','artist','giftedmusic'));
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
