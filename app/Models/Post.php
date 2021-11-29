<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    public static $rules = [
        'music_image' => 'image|file',
        'music_file' => 'file',
        'music_trial' =>'file'
    ];

    public function giftMusic()
    {
        return $this->hasOne(GiftMusic::class, 'music_id');
    }
    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

}
