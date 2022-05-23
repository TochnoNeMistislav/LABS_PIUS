<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'employee_id' =>Employee::inRandomOrder()->first()->id,
            'customer_id' =>Customer::inRandomOrder()->first()->id,
            'description' => Str::random(10),
            //'date_creation'=> date("Y-m-d H:i:s"),
            'ship_to_date' => date("Y-m-d"),
            'addres' => Str::random(32),
            'amount_paid' => rand( 10, 20 )        
        ];
    }
}
