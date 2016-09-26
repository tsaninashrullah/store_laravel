<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware' => 'admin'], function(){
	Route::post('import_games', 'ExcelsController@import_games');
	Route::get('export_games', 'ExcelsController@export_games');
	Route::get('export_comments/{id}', 'ExcelsController@export_comments')->name('e_comments/{id}');
});