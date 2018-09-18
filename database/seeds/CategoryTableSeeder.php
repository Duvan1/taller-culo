<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::truncate();
        $items = [
            ['name' => 'Category 1'            
            ],
            ['name' => 'Category 2'             
            ],
            ['name' => 'Category 3'            
            ],
            ['name' => 'Category 4'            
            ],
        ];

        foreach ($items as $item) {
            \App\Category::create($item);
        }
    }
}
