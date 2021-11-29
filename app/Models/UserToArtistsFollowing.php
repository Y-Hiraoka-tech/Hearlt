<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserToArtistsFollowing extends Model
{
    protected $table = 'UserToArtists';

    public function artist() { 
        //Followingモデルからそれを所有しているUserへアクセスする
        return $this->belongsTo(\App\Models\Artist::class);
    }
    
}
