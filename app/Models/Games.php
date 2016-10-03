<?php

namespace App\Models;

use App\Models\Comments;
use App\Models\Users;

use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    protected $fillable = [
    	'title','author','email','description','image'
    ];
    public function users() {
      return $this->belongsToMany('App\Models\Users', 'comments');
    }
    public function comments() {
	    return $this->hasMany('App\Models\Comments', 'games_id');
	}
}
