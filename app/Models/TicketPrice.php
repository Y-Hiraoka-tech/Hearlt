<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketPrice extends Model
{
    protected $table = 'TicketPrice';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
