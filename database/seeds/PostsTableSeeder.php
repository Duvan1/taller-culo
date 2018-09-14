<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['title' => 'Post 1',
             'url' => str_slug('Post 1'),
             'excerpt' => 'fa fa-cutlery',
             'body' => '<p>jncsdjbvdfp </p>',
             'published_at' => Carbon::now(),
             'category_id' => 1             
            ],
            ['title' => 'Post 2',
            'url' => str_slug('Post 2'),
             'excerpt' => 'fa fa-cutlery',
             'body' => '<p>jncsdjbvdfp </p>',
             'published_at' => Carbon::now(),
             'category_id' => 1             
            ],
            ['title' => 'Post 3',
            'url' => str_slug('Post 3'),
             'excerpt' => 'fa fa-cutlery',
             'body' => '<p>jncsdjbvdfp </p>',
             'published_at' => Carbon::now(),
             'category_id' => 2             
            ],
            ['title' => 'Post 4',
            'url' => str_slug('Post 4'),
             'excerpt' => 'fa fa-cutlery',
             'body' => '<p>jncsdjbvdfp </p>',
             'published_at' => Carbon::now(),
             'category_id' => 2            
            ],
        ];

        foreach ($items as $item) {
            \App\Post::create($item);
        }
    }
}
