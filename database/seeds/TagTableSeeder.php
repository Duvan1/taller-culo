<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['name' => 'Tag 1'            
            ],
            ['name' => 'Tag 2'             
            ],
            ['name' => 'Tag 3'            
            ],
            ['name' => 'Tag 4'            
            ],
        ];

        foreach ($items as $item) {
            \App\Tag::create($item);
        }
    }
}
