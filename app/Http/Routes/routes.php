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
Route::group(['middleware' => 'admin'], function () {
	Route::get('users', 'UsersController@index')->name('users');
	Route::post('users/{id}', 'UsersController@destroy')->name('users.destroy');
	Route::post('users/{id}/active', 'UsersController@active')->name('users.active');
	Route::post('users/{id}/deactive', 'UsersController@deactive')->name('users.deactive');
	Route::post('user/{id}', 'UsersController@show')->name('users.show');
});
	Route::get('users/create', 'UsersController@create')->name('users.role');
	Route::post('users', 'UsersController@role')->name('users.roles');

Route::group(['middleware' => 'auth'], function () {
	Route::get('home', 'GamesController@home');
	Route::get('comments_user/{id}', 'CommentsController@comments_user')->name('comments');
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