<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Following;
use App\Models\UserToArtistsFollowing;

class AdminFollowController extends Controller
{
    public function index()
    {
        $user_followings = Following::all();
        $artist_followings = UserToArtistsFollowing::all();
        return view('admin.follow.index', compact('user_followings','artist_followings'));
    }
}
