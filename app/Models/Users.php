<?php

namespace App\Models;

use Cartalyst\Sentinel\Users\UserInterface;

use Cartalyst\Sentinel\Users\EloquentUser as SentinelUser;
use App\Models\Games;

// use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends SentinelUser
{
    /**
     * The attributes that are mass assignable.
     *
     * @var arra
     */
    
    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'permissions',
        'username',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function games() {
      return $this->belongsToMany('App\Models\Games', 'comments');
    }
}
