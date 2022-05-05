<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
    * Run the database seeders.
    *
    * @return void
    */
    public function run()
    {
        /*Category::factory()
                ->count(25)
                ->create();*/

        for($i = 0; $i<100; ++$i){
            Category::factory()->create();
        }
    }
}