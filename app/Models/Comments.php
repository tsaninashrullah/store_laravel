<?php

namespace App\Models;

use App\Models\Games;
use App\Models\Users;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = [
    	'comments',
    ];
    public function games() {
	    return $this->belongsTo('App\Models\Games', 'games_id');
	}
	public function users() {
	    return $this->belongsTo('App\Models\Users', 'users_id');
	}
}
