<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Following extends Model
{
    const UNAPPROVAL = 0;
    const APPLOVAL = 1;

    public function scopeIsUnapproval($query){
        return $query->where("status",self::UNAPPROVAL);
    }

    public function scopeIsApproval($query){
        return $query->where("status",self::APPROVAL);
    }
    
    public function user() { 
        //Followingモデルからそれを所有しているUserへアクセスする
        //belongsTomanyを使って一個で済ませることができるのか
        return $this->belongsTo(\App\Models\User::class);
    }
    public function artist() { 
        //Followingモデルからそれを所有しているUserへアクセスする
        return $this->belongsTo(\App\Models\Artist::class);
    }
}
