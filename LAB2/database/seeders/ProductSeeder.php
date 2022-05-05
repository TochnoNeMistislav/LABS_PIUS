<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
    * Run the database seeders.
    *
    * @return void
    */
    public function run()
    {

        for($i = 0; $i<100; ++$i){
            Product::factory()->create();
            }

    }
}