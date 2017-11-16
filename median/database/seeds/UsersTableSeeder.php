<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$faker = Faker\Factory::create();
		DB::table('users')->delete();
    	for ($i=0; $i < 5; $i++) { 
    		$name = $faker->unique()->name;
    		DB::table('users')->insert([
	            'name' => $name,
	            'email' => $faker->email,
                'password' => bcrypt('secret'),
	            'username' => $faker->userName,
	        ]);
    	}
    }
}