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

    
    public function index(Request $request)
    {
        if($request->ajax()) {

          if($request->keywords) {

            $games = Games::where('title', 'like', '%'.$request->keywords.'%')
              ->orWhere('author', 'like', '%'.$request->keywords.'%')
              ->paginate(2);
              $view = (String) view('games._list')
                ->with('games', $games)
                ->render();
              return response()->json(['view' => $view]);
            }else{
            $games = Games::paginate(2);
            $view = (String)view('games._list')
            ->with('games', $games)
            ->render();
            return response()->json(['view' => $view]);
            }
        } else {
          $games = Games::paginate(2);
          return view('games.index')
            ->with('games', $games);
        }
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
        $game->image = $game->id . '.jpg';
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

        $image_locations = public_path().'/uploads/images/' . $games->id;
        $image_location = public_path().'/uploads/images/' . $games->id . '/';
        File::deleteDirectory($image_locations);
        $file = $request->file('image');
        $image = Image::make($file);
        $direction  = File::makeDirectory($image_location,0777, true, true);
        // $final = $direction . "/";
        $image->save($image_location . $games->id . '.jpg');
        $image->resize(200,100);
        $image->save($image_location . 'thumb'. $games->id . '.jpg');
        $games->image =  'uploads/images/' . $games->id . '/' . $games->id . '.jpg';
        // $request->file('image')->move($uploadDestinationPath, $new_file_name);
        $games->update($request->all());
        Session::flash('notice', 'Success update games');
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
    $image_locations = public_path().'/uploads/images/' . $game->id;
    File::deleteDirectory($image_locations);
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
