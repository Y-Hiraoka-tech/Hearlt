<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;

class GiftMusic extends Model
{
    protected $table = 'GiftMusic';

    public function post()
    {
        return $this->hasOne(Post::class,'id', 'music_id');
    }

}
