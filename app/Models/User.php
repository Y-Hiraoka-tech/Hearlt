<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //scopeメソッドを使うとwhereが自分で作れる
    public function followRequests(){
        //自分に向けてフォロリクを送ってきている人がわかる
        return $this->hasmany("App\Models\Following",'following_user_id', 'id')->isunapproval();
    }
    // public function followed(){
    //     return $this->hasmany("App\Models\Following",'following_user_id', 'id')->where('user_id',Auth::id())->approval();
    // }
    protected $fillable = [
        
        'name',
        'email',
        'password',
        'username',
        'user_image',
        'introduction',
        'phone',
        'tickets'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    

    /**
     * User tokens relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tokens()
    {
        return $this->hasMany(Token::class);
    }

    /**
     * Return the country code and phone number concatenated
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phone;
    }
    public function ticket()
    {
        return $this->hasOne(Ticket::class);
    }

    public function giftMusic()
    {
        return $this->hasOne(GiftMusic::class);
    }

}

