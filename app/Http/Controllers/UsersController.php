<?php

namespace App\Http\Controllers;

use App\Http\Requests\RolesRequest;
use Illuminate\Http\Request;
use App\Models\Users;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\Http\Requests;
// use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Activation;
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
