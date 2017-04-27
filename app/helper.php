<?php
use App\Models\Games;
use App\Models\Users;
function user_info()
{
	if (\Sentinel::check()) {
		$user = \Sentinel::getUser();
		return $user;
	}
}

function getGames()
{
	$games = Users::all();
	return $games;
}