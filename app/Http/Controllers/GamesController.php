<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Games;

use Cartalyst\Sentinel\Users\UserInterface;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

use Session, Image;
use File;

use App\Http\Requests\GamesRequest;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function index()
    {
        $games = Games::all();
        return view('games.index')->with('games', $games);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('games.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GamesRequest $request)
    {

        $game = new Games();
                
        $game->title = $request->title;
        $game->author = $request->author;
        $game->email = $request->email;
        $game->description = $request->description;
        $game->save();

        $file = $request->file('image');
        $image = Image::make($file);
        $image_location = public_path().'/uploads/images/' . $game->id . '/';
        $direction  = File::makeDirectory($image_location,0777, true, true);
        // $final = $direction . "/";
        $image->save($image_location . $game->id . '.jpg');
        $image->resize(200,100);
        $image->save($image_location . 'thumb'. $game->id . '.jpg');
        $game->image =  'uploads/images/' . $game->id . '/' . $game->id . '.jpg';
        $game->save();
        Session::flash('notice', 'Success add game');
        $games = Games::all();
        return redirect('games')->with('games', $games);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $game = Games::find($id);
            return view('games.show')
        ->with('game', $game);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $games = Games::find($id);
            return view('games.edit')
        ->with('game', $games);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GamesRequest $request, $id)
    {
        $games = Games::find($id);
        $new_file_name = $request->title . ".jpg";
        $uploadDestinationPath = "upload-image/";
        $deletefile = File::delete('upload-image/'.$request->image);
        if ($request->file('image')->isValid()) {
            $request->file('image')->move($uploadDestinationPath, $new_file_name);
        }else{
            echo "<script>alert('Failed');</script>";
            die();
            return back();
        }
        // $request->file('image')->move($uploadDestinationPath, $new_file_name);
        $games->update($request->all());
        Session::flash('notice', 'Success update game');
        return Redirect('games');       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $games = Games::all();
    $game_id = Games::find($id);
    File::delete('upload-image/'.$game_id->image);
        if ($game_id->delete()) {
          Session::flash('notice', 'Game success delete');
          return Redirect('games')->with('games', $games);
        } else {
          Session::flash('error', 'Game fails delete');
          return Redirect('games');
        }
    }

    public function home(){
        return view('home');
    }
}
