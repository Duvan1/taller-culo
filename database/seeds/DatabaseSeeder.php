<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	Post::truncate();
    	Category::truncate();
        $this->call(PostsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(TagTableSeeder::class);
    }
}
