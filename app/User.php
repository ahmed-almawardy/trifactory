<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'firstname', 'lastname', 'email', 'phone', 'nationality', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function credit()
    {
        return $this->hasMany('App\Usercredit');
    }

    public function usercredit()
    {
        return $this->hasMany('App\Usercredit');
    }

    public function order()
    {
        return $this->hasMany('App\Order');
    }

    public function userrace()
    {
        return $this->hasMany('App\UserRace');
    }

    public function ticket()
    {
        return $this->hasMany('App\Ticket');
    }

    public function voucher()
    {
        return $this->hasMany('App\Voucher');
    }
}
