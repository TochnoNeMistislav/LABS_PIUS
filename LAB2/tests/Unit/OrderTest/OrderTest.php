<?php

use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class);

it('can create a order', function () {
    $attributes = Order::factory()->raw();
    $response = $this->postJson('/api/ApiV1/Order', $attributes);
    $response->assertStatus(201);
    $this->assertDatabaseHas('orders', $attributes);
});

it('can get a order', function () {
    $order = Order::factory()->create();

    $response = $this->getJson("/api/ApiV1/Order/{$order->id}");

    $data = [
        'data' => [
            'id' => $order->id,
            'employee_id' => $order->employee_id,
            'customer_id' => $order->customer_id,
            'description' => $order->description,
            'ship_to_date' =>$order->ship_to_date,
            'addres' => $order->addres,
            'amount_paid' => $order->amount_paid,
            
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



it('can put a order', function () {
    $order = Order::factory()->create();
    $updatedOrder = ['addres' => 'Put Order'];
    $response = $this->putJson("/api/ApiV1/Order/{$order->id}", $updatedOrder);
    $response->assertStatus(200);
    $this->assertDatabaseHas('orders', $updatedOrder);
});

it('can patch a order', function () {
    $order = Order::factory()->create();
    $updatedOrder = ['description' => 'Patch Order'];
    $response = $this->patchJson("/api/ApiV1/Order/{$order->id}", $updatedOrder);
    $response->assertStatus(200);
    $this->assertDatabaseHas('orders', $updatedOrder);
});

it('can delete a order', function () {
    $order = Order::factory()->create();
    $response = $this->deleteJson("/api/ApiV1/Order/{$order->id}");
    $response->assertStatus(200);
});