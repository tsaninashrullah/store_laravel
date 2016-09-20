<?php

namespace App\Models;

use Cartalyst\Sentinel\Users\EloquentUser as CartalystUser;

// use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends CartalystUser
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
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
