<?php

namespace App;

use Cartalyst\Sentinel\Users\UserInterface;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cartalyst\Sentinel\Users\EloquentUser as SentinelUser;
use App\Models\Games;
use App\Roles;
use App\Models\Comments;

// use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends SentinelUser
{
    /**
     * The attributes that are mass assignable.
     *
     * @var arra
     */
    protected $tableName = 'users';
    use SoftDeletes;
    protected $loginNames = ['username'];
        
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
    protected $dates = ['deleted_at'];
    
    public function games() {
      return $this->belongsToMany('App\Models\Games', 'comments');
    }
    public function activation() {
       return $this->hasOne('App\Activations', 'user_id');
    }
    public function comments() {
        return $this->hasMany('App\Models\Comments', 'users_id');
    }
}
?>
