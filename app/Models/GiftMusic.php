<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use App\Models\GiftMusicAnnouncementRead;

class GiftMusic extends Model
{
    protected $table = 'GiftMusic';

    public static $rules = [
        'address' => 'nullable'
    ];

    public function post()
    {
        return $this->hasOne(Post::class,'id', 'music_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function gifted_user()
    {
        return $this->belongsTo(User::class);
    }


}
