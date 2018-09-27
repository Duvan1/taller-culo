<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Tag;
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
        Storage::disk('public')->deleteDirectory('posts');
    	Post::truncate();
    	Category::truncate();
        Tag::truncate();
        $this->call(PostsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
