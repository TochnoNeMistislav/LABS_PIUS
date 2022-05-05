<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;
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
            'activity'=>$this->faker->boolean(), 
            'date_creation' => date("Y-m-d H:i:s"),
            'parent_category' => count(Category::all()) != 0 ? ($this->faker->boolean(50) ? Category::inRandomOrder()->first()->id : null): null
        ];
    }
    
}