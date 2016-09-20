<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Users;

use App\Http\Requests\UsersRequest;

use Cartalyst\Sentinel\Users\UserInterface;

use Cartalyst\Sentinel\Native\Facades\Sentinel;

use Cartalyst\Sentinel\Activations\EloquentActivation;

use App\Models\Games;

use Activation;

use Session;

class AuthController extends Controller
{
    public function signup(){
    	return view('auth.signup');
    }

    public function register(UsersRequest $request){
    	$credentials = [
		    'name' => $request->name,
		    'email'    => $request->email,
		    'password' => $request->password,
		];

		$user = Sentinel::register($credentials);
		$activation = Activation::create($user);	

		return view('home');
    }

    public function login(){
    	return view('auth.login');
    }

    public function auth(Request $request){
    	$credentials = [
		    'email'    => $request->email,
		    'password' => $request->password,
		];
		$users = Sentinel::findById(1);
		// Sentinel::login($users);

		if ($user = Sentinel::authenticate($credentials))
		{
			$games = Games::all();
	        Session::flash('notice', 'Success Login');
			return view('games.index')->with('games', $games);
		}
		else
		{
	        Session::flash('error', 'Failed to Login');
			return redirect('login');
		}
    }

    public function logout(){
    	Sentinel::logout();
		return redirect('login');
    }
}
