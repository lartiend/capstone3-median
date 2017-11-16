<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->delete();
        $arr = ['life', 'web development', 'underworld', 'party', 'nature'];

        for ($i=0; $i < count($arr); $i++) { 
            DB::table('tags')->insert([
            'name' => $arr[$i],
            ]);
        }
    }
}