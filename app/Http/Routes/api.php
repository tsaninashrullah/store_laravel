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
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->get('games', 'App\Http\Controllers\GamesController@indexApi');
});

$api->version('v1', function ($api) {
    $api->post('games/create', 'App\Http\Controllers\GamesController@create');
});