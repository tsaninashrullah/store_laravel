<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Input, DB, Excel;
use App\Models\Games;
use App\Models\Comments;

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
    	return redirect('games.index')->with('games', $games);
    }
    public function export_games()
    {
    	$games = Games::all();
    	Excel::create('Game', function($excel) use($games){
    		$excel->sheet('Sheet 1', function($sheet) use($games){
    			$sheet->fromArray($games);
    		});
    	})->export('xlsx');
    }

    public function import_comments(Request $request, $id)
    {
        Excel::selectSheets('Comment')->load($request->comments,function($reader){
            $reader->each(function($sheet){
                Comments::firstOrCreate($sheet->toArray());
            });
        });
        $comments_user = Games::find($id)->comments;
        $games = Games::find($id);
        return redirect('comments_user/'. $id)->with('games', $games)->with('comments_user', $comments_user);
    }

    public function export_comments($id)
    {        
        $comments = Games::find($id)->comments;
        foreach ($comments as $comment) {
                 $data1 [] = array(
                    'id' => $comment->id,
                    'games_id' => $comment->games_id,
                    'users_id' => $comment->users_id,
                    'comments' => $comment->comments
                    );
        }
        $games = Games::find($id);
                    $data [] = array(
                        'id' => $games->id,
                        'title' => $games->title,
                        'author' => $games->author,
                        'email' => $games->email,
                        'description' => $games->description,
                        'image' => $games->image
                    );

        Excel::create('comment_list',function($excel)use($data,$data1){         
            $excel->sheet('Games',function($sheet)use($data){
                $sheet->fromArray($data,null,'A1',false,false)->prependRow(array('Games ID','Title Games','Author','Email','Description Games','Images'))->freezeFirstRow();
            });
            $excel->sheet('Comment',function($sheet)use($data1){
                $sheet->fromArray($data1,null,'A1',false,false)->prependRow(array('id','games_id','users_id','comments'))->freezeFirstRow();
            });
        })->export('xlsx');
    }
}
