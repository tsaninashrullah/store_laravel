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

Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');

Route::group(['middleware' => 'admin'], function () {
	Route::get('users', 'UsersController@index')->name('users');
	Route::get('users/restore', 'UsersController@restore')->name('users.restore');
	Route::delete('users/{id}', 'UsersController@destroy')->name('users.destroy');
	Route::post('users/{id}/active', 'UsersController@active')->name('users.active');
	Route::post('users/{id}/deactive', 'UsersController@deactive')->name('users.deactive');
	Route::get('user/{id}', 'UsersController@show')->name('users.show');
	Route::post('users/restore/{id}', 'UsersController@process_restore')->name('users.restores');
	Route::delete('comments/{id}', 'CommentsController@destroy')->name('comments.destroy');
});
	Route::get('f_restore', 'UsersController@f_restore')->name('f_restore');
	Route::get('change-password/{token}', 'UsersController@change_password')->name('change');
	Route::post('change-password-store/{token}', 'UsersController@change_password_store')->name('change-store');
	Route::get('users/create', 'UsersController@create')->name('users.role');
	Route::post('reset', 'UsersController@reset_password_store')->name('users.store-reset');
	Route::post('users', 'UsersController@role')->name('users.roles');

Route::group(['middleware' => 'auth'], function () {
	Route::get('home', 'GamesController@home');
	Route::get('comments_user/{id}', 'CommentsController@comments_user')->name('comments');
	Route::POST('comments/{id}', 'CommentsController@store')->name('comments.store');
});
Route::group(['middleware' => 'back'], function () {
	Route::get('login', 'CekController@login')->name('login');
	Route::post('auth', ['as'=>'auth','uses'=>'CekController@auth']);
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