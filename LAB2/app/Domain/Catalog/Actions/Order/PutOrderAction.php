<?php

namespace App\Domain\Catalog\Actions\Order;
use App\Domain\Catalog\Models\Order;

class PutOrderAction
{
    public function execute(int $orderId, array $fields): Order
    {
        $order = Order::findOrFail($orderId);
        $order->update($fields);

        return $order;
    }

}