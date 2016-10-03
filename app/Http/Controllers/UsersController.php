<?php

namespace App\Http\Controllers;

use App\Http\Requests\RolesRequest;
use Illuminate\Http\Request;
use App\Models\Users;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\Http\Requests;
use Activation, Validator, Redirect, Mail, Session, Hash;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Users::all();
        return view('users.index')
            ->with('users', $users);
    }

    public function active($id)
    {
        $users = Users::all();
        $user = Sentinel::findById($id);
        $activation = Activation::create($user);
        return redirect('users')
            ->with('users', $users);
    }

    public function deactive($id)
    {
        $users = Users::all();
        $user = Sentinel::findById($id);
        $activation = Activation::remove($user);
        return redirect('users')
            ->with('users', $users);
    }

    public function restore()
    {
        $users = Users::onlyTrashed()->get();
        return view('users._list_deleted')->with('users', $users);
    }

    public function process_restore($id)
    {
        $user = Users::onlyTrashed()->get();
        $users = Users::onlyTrashed($id)->restore();
        return redirect('users/restore')->with('users', $user);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function role(RolesRequest $request)
    {
        $role = Sentinel::getRoleRepository()->createModel()->create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);
        return view('home');
    }

    public function create()
    {
        return view('users.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = Users::find($id);
        return view('users.users')->with('users', $users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = Users::find($id);
        $user = $users->delete();
        return view('users.index');
    }

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function f_restore()
    {
        return view('users.f_restore');
    }




    public function change_password($forgot_token)
    {
        $find_user = Users::where('forgot_token', $forgot_token)->first();
        if(empty($find_user)) {
            Session::flash('error', 'Token not valid, :)');
            return Redirect::to('/');
        } else {
            return view('users.change_password')
            ->with( 'forgot_token', $find_user->forgot_token)->with('email',$find_user->email);
        }
    }

    public function change_password_store(Request $request, $forgot_token)
    {
        $valid = array(
        'password' => ('required|confirmed')
        );
        $data = $request->all();
        $validate = Validator::make($data, $valid);
        $find_data = Users::where('forgot_token', $forgot_token)->first();
        if($validate->fails()) {
          return redirect('change-password/'.$find_data->forgot_token)
            ->withErrors($validate)->withInput();
        } else {
          $find_data->password = Hash::make($request->password);
          $find_data->forgot_token = null;
          $find_data->save();
          Session::flash('notice ', 'Hai ' . $find_data->username . ' Password has change lets login');
          return Redirect::to('login');
        }
    }
    public function reset_password_store(Request $request)
    {
        $valid = array(
          'email' => 'required|email'
        );
        $data = $request->all();
        $validate = Validator::make($data, $valid);
        $find_data = Users::where('email', $request->email)->first();
        if($validate->fails()) {
          return Redirect::to('f_restore')
          ->withErrors($validate)
          ->withInput();
        } elseif(empty($find_data)) {
          Session::flash('error', 'Email not found' . $request->email);
          return Redirect::to('f_restore')
            ->withErrors($validate)
            ->withInput();
        } else {
          $find_data->forgot_token = str_random(40);
          $find_data->save();
        Mail::send('users.email', $find_data->toArray(), function($message) use($find_data) {
                $message->from('Games@store.com','TRSNW Games');
                $message->to($find_data->email)->subject('Reset Password');
                });
        Session::flash('notice', 'Check your email, the reset password instruction has sent to '.$find_data->email);
          return Redirect::to('/');
        }
    }
}
