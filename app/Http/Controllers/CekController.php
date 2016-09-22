<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Users;

use App\Http\Requests\UsersRequest;

use Cartalyst\Sentinel\Users\UserInterface;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

use Cartalyst\Sentinel\Activations\EloquentActivation;

use App\Models\Games;

use Activation;

use Session;

class CekController extends Controller
{
    public function signup(){
    	return view('auth.signup');
    }

    public function register(UsersRequest $request){
    	$credentials = [
		    'first_name' => $request->first_name,
		    'last_name' => $request->last_name,
		    'email'    => $request->email,
		    'password' => $request->password,
		    'username' => $request->username,
		];

		Sentinel::registerAndActivate($credentials);
		Sentinel::authenticate($credentials);
		return redirect('home');
    }

    public function login(){
    	return view('auth.login');
    }

    public function auth(Request $request){
    	$credentials = [
		    'email'    => $request->email,
		    'password' => $request->password,
		];
		// var_dump();
		Sentinel::check();
		if ($user = Sentinel::authenticate($credentials))
		{
		    // Authentication successful and the user is assigned to the `$user` variable.
	        Session::flash('notice', 'Success login');
			return redirect('home')->with('user', $credentials);
		}
		else
		{
	        Session::flash('notice', 'Failed to login');
			return redirect('login');
		    // Authentication failed.
		}
    }

    public function logout(){
    	Sentinel::logout();
		return redirect('login');
    }
}
