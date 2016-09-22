<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Games;

class BaseController extends Controller
{   
    public function list_games(){
    	$games = Games::paginate(5);
    	return view('list')->with('games', $games);
    }
}
