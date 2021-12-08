<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GiftMusic;

class AdminGiftController extends Controller
{
    public function index()
    {
        $gifts = GiftMusic::all();
        return view('admin.gift.index', compact('gifts'));
    }
}
