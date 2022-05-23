<?php

namespace App\Domain\Catalog\Actions\Order;
use App\Domain\Catalog\Models\Order;

class PostOrderAction
{
    public function execute(array $fields): Order
    {
        $order = Order::create($fields);

        return $order;
    }

}