<?php

use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class);

it('can create a employee', function () {
    $attributes = Employee::factory()->raw();
    $response = $this->postJson('/api/ApiV1/Employee', $attributes);
    $response->assertStatus(201);
    $this->assertDatabaseHas('employees', $attributes);
});

it('can get a order', function () {
    $employee = Employee::factory()->create();

    $response = $this->getJson("/api/ApiV1/Employee/{$employee->id}");

    $data = [
        'data' => [
            'id' => $employee->id,
            'lastname' => $employee->lastname,
            'firstname' => $employee->firstname,
            'phone' => $employee->phone,
            'salary' =>$employee->salary,
            
        ],
        'errors' => [
            
        ],
        'meta' => [

            ]
        ];
        
        $response->assertStatus(200)->assertJson($data);
    });

/*it('can put a order', function () {
    $order = Order::factory()->create();
    $updatedOrder = ['addres' => 'Put Order'];
    $response = $this->putJson("/api/ApiV1/Order/{$order->id}", $updatedOrder);
    $response->assertStatus(200);
    $this->assertDatabaseHas('orders', $updatedOrder);
});*/



it('can put a employee', function () {
    $employee = Employee::factory()->create();
    $updatedEmployee = ['firstname' => 'Put Employee'];
    $response = $this->putJson("/api/ApiV1/Employee/{$employee->id}", $updatedEmployee);
    $response->assertStatus(200);
    $this->assertDatabaseHas('employees', $updatedEmployee);
});

it('can patch a employee', function () {
    $employee = Employee::factory()->create();
    $updatedEmployee = ['lastname' => 'Patch Employee'];
    $response = $this->patchJson("/api/ApiV1/Employee/{$employee->id}", $updatedEmployee);
    $response->assertStatus(200);
    $this->assertDatabaseHas('employees', $updatedEmployee);
});

it('can delete a employee', function () {
    $employee = Employee::factory()->create();
    $response = $this->deleteJson("/api/ApiV1/Employee/{$employee->id}");
    $response->assertStatus(200);
});