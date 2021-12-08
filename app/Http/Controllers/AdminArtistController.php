<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;

class AdminArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::all();
        return view('admin.artist.index', compact('artists'));
    }
}
