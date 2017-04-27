<?php

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use App\Models\Games;
use Illuminate\Database\Seeder;

class AddAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$credentials = [
		    'first_name' => "Super",
		    'last_name' => "Admin",
		    'email'    => "superadmin@games.com",
		    'password' => "12345678",
		    'username' => "superadmin",
		];
		Sentinel::registerAndActivate($credentials);
    }
}
