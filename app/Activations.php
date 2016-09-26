<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activations extends Model
{
    //
	public function user() {
		return $this->belongsTo('App\Models\Users', 'user_id');
	}
}
