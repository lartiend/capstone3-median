<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Article;
use App\Tag;
use Illuminate\Support\Facades\DB;

class articles_tagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('article_tags')->delete();
    	for ($i=0; $i < 15; $i++) { 
    		$article_id = rand(1, Article::count());
    		$tag_id 	= rand(1, Tag::count());
    		DB::table('article_tags')->insert([
	            'article_id' => $article_id,
	            'tag_id' => $tag_id,
	        ]);
    	}
    }
}

