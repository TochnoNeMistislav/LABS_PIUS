<?php

namespace App\Domain\Catalog\Actions\Order;
use App\Domain\Catalog\Models\Order;

class DeleteOrderAction
{
    public function execute(int $orderId): Order
    {
        $order = Order::findOrFail($orderId);
        $order->delete();

        return $order;
    }

}