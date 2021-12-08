<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TicketPrice;
use App\Models\Ticket;
use App\Models\PurchaseHistory;

class AdminTicketController extends Controller
{
    public function index()
    {
        $ticket_prices = TicketPrice::all();
        $tickets = Ticket::all();
        $purchase_histories = PurchaseHistory::all();
        return view('admin.ticket.index', compact('ticket_prices','tickets','purchase_histories'));
    }
}
