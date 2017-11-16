<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->command->info('User table seeded!');
        // $this->call(ArticlesTableSeeder::class);
        // $this->command->info('Article table seeded!');
    }
}

composer dump-autoload // if class not found.

php artisan migrate:fresh // drop all tables and migrate
php artisan db:seed --class=UsersTableSeeder
php artisan db:seed --class=ArticlesTableSeeder
php artisan db:seed --class=TagsTableSeeder
php artisan db:seed --class=articles_tagsTableSeeder
