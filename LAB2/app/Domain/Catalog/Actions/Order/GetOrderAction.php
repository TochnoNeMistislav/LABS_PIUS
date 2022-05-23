<?php

namespace App\Domain\Catalog\Actions\Order;
use App\Domain\Catalog\Models\Order;

class GetOrderAction
{
    public function execute(int $orderId): Order
    {
        $order = Order::findOrFail($orderId);

        return $order;
    }

}