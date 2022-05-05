<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => Str::random(10),
            'token' => Str::random(10),
            'description' => Str::random(10),
            'date_creation' => date("Y-m-d H:i:s"),
            'price' => mt_rand( 100, 10000 ),
            'jpeg' => "/Fresko.jpg",
            'amount' => rand( 0, 100 ),
            'category_id' =>Category::inRandomOrder()->first()->id
            //'parent_category'=>Category::inRandomOrder()->first()->id

        ];
    }


}