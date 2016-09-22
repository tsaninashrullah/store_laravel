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
Route::group(['middleware' => 'auth'], function () {
	Route::get('home', 'GamesController@home');
	Route::get('comments_user/{id}', 'CommentsController@comments_user');
	Route::POST('comments/{id}', 'CommentsController@store')->name('comments.store');
});
Route::group(['middleware' => 'back'], function () {
	Route::get('login', 'CekController@login')->name('login');
	Route::post('auth', 'CekController@auth');
	Route::get('signup', 'CekController@signup')->name('signup.register');
	Route::post('register', 'CekController@register')->name('register');
});
Route::get('logout', 'CekController@logout');
Route::get('/', 'BaseController@list_games')->name('list');


// Route::auth();

// $api = app('Dingo\Api\Routing\Router');

// $api->version('v1', function ($api) {
//     $api->get('games', 'App\Http\Controllers\GamesController@index');
// });