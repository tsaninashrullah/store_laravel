<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cartalyst\Sentinel\Native\Facades\Sentinel;

use App\Http\Requests;

class UsersController extends Controller
{
    public function create()
    {
        return view('users.create');
    }
    public function store(UserRequest $request){
	$credentials = [
	    'email'    => '',
	    'email'    => '',
	    'password' => '',
	];

	$user = Sentinel::register($credentials);
    }
}
