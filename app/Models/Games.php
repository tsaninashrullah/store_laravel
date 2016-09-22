<?php

namespace App\Models;

use App\Models\Users;

use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    protected $fillable = [
    	'title','author','email','description'
    ];
    public function users() {
      return $this->belongsToMany('App\Models\Users', 'comments');
    }
}
