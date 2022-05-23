<?php

use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class);

it('can create a customer', function () {
    $attributes = Customer::factory()->raw();
    $response = $this->postJson('/api/ApiV1/Customer', $attributes);
    $response->assertStatus(201);
    $this->assertDatabaseHas('customers', $attributes);
});

it('can get a customer', function () {
    $customer = Customer::factory()->create();

    $response = $this->getJson("/api/ApiV1/Customer/{$customer->id}");

    $data = [
        'data' => [
            'id' => $customer->id,
            'name' => $customer->name,
            'addres' => $customer->addres,
            'phone' => $customer->phone,
            'FAX' => $customer->FAX,           
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



it('can put a customer', function () {
    $customer = Customer::factory()->create();
    $updatedCustomer = ['addres' => 'Put Customer'];
    $response = $this->putJson("/api/ApiV1/Customer/{$customer->id}", $updatedCustomer);
    $response->assertStatus(200);
    $this->assertDatabaseHas('customers', $updatedCustomer);
});

it('can patch a order', function () {
    $customer = Customer::factory()->create();
    $updatedCustomer = ['name' => 'Patch `Customer'];
    $response = $this->patchJson("/api/ApiV1/Customer/{$customer->id}", $updatedCustomer);
    $response->assertStatus(200);
    $this->assertDatabaseHas('customers', $updatedCustomer);
});

it('can delete a order', function () {
    $customer = Customer::factory()->create();
    $response = $this->deleteJson("/api/ApiV1/Customer/{$customer->id}");
    $response->assertStatus(200);
});
