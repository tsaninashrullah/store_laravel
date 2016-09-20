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

Route::get('/', 'BaseController@list_games');
Route::get('home', 'GamesController@home');

Route::auth();

Route::get('login', 'AuthController@login')->name('login');
Route::post('auth', 'AuthController@auth');
Route::get('signup', 'AuthController@signup')->name('signup.register');
Route::post('register', 'AuthController@register')->name('register');
Route::get('logout', 'AuthController@logout');
// $api = app('Dingo\Api\Routing\Router');

// $api->version('v1', function ($api) {
//     $api->get('games', 'App\Http\Controllers\GamesController@index');
// });