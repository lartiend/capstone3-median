<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
		DB::table('articles')->delete();
    	for ($i=0; $i < 30; $i++) { 
    		$nbWords 	= rand(2, 4);
    		$user_id 	= rand(1, User::count());

    		$content 	= $faker->paragraphs($nb=20, $asText=true);
            $title      = $faker->sentence($nbWords, true);
            $title      = trim($title,'.');
    		$created_at = $faker->dateTimeThisMonth()->format('Y-m-d H:i:s');

    		DB::table('articles')->insert([
	            'title' => $title,
	            'content' => $content,
	            'user_id' => $user_id,
                'created_at' => $created_at,
                'updated_at' => $created_at,
                'rate' => rand(1, 5), // 1-5 stars
	            'image' => 'img/no-image.jpg',
	        ]);
    	}
    }
}
