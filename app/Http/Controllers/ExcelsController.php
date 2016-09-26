<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Input, DB, Excel;
use App\Models\Games;

class ExcelsController extends Controller
{
    public function import_games(Request $request)
    {
    	$games = Games::paginate(2);
    	Excel::load($request->games,function($reader){
    		$reader->each(function($sheet){
    			Games::firstOrCreate($sheet->toArray());
    		});
    	});
    	return view('games')->with('games', $games);
    }
    public function export_games()
    {
    	$games = Games::all();
    	Excel::create('Game List', function($excel) use($games){
    		$excel->sheet('Sheet 1', function($sheet) use($games){
    			$sheet->fromArray($games);
    		});
    	})->export('xlsx');
    }
    public function export_comments($id)
    {
        $games = Games::find($id);
        Excel::create('Game List', function($excel) use($games){
            $excel->sheet('Game', function($sheet) use($games){
                $sheet->fromModel( array($games), null, 'A1', true);
            });
        })->export('xlsx');
        // return redirect('comments');
    }
}
