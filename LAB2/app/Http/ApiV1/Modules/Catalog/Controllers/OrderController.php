<?php

namespace App\Http\ApiV1\Modules\Catalog\Controllers;

use App\Http\ApiV1\Modules\Catalog\Controllers\Controller;
use App\Domain\Catalog\Actions\Order\DeleteOrderAction;
use App\Domain\Catalog\Actions\Order\PostOrderAction;
use App\Domain\Catalog\Actions\Order\PutOrderAction;
use App\Domain\Catalog\Actions\Order\GetOrderAction;
use App\Domain\Catalog\Actions\Order\PatchOrderAction;
use App\Http\ApiV1\Modules\Catalog\Resources\OrderResource;
use App\Http\ApiV1\Modules\Catalog\Requests\OrderRequests\PatchOrderRequest;
use App\Http\ApiV1\Modules\Catalog\Requests\OrderRequests\PostOrderRequest;
use App\Http\ApiV1\Modules\Catalog\Requests\OrderRequests\PutOrderRequest;

class OrderController extends Controller
{
    public static string $code = '200';
    public static string $message = 'OK';

    public function patch(int $id, PatchOrderRequest $request, PatchOrderAction $action) {
        /*$order =  new OrderResource(
            $action->execute($id, $request->validated())
        );
        return response()->json($order, OrderController::$code);*/
        return new OrderResource(
            $action->execute($id, $request->validated())
        );
    }

    public function get(int $id, GetOrderAction $action) {
        $order = new OrderResource($action->execute($id));
        $order->message = OrderController::$message;
        $order->code = OrderController::$code;
        return response()->json($order, OrderController::$code);
    }
    public function put(int $id, PutOrderRequest $request, PutOrderAction $action) {
        return new OrderResource(
            $action->execute($id, $request->validated())
        );
    }

    public function post(PostOrderRequest $request, PostOrderAction $action) {
        $order =  new OrderResource(
            $action->execute($request->validated())
        );
        return response()->json($order, 201);
    }
    
    public function delete(int $id, DeleteOrderAction $action)
    {
        $order = new OrderResource($action->execute($id));
        $order->message = OrderController::$message;
        $order->code = OrderController::$code;
        return response()->json($order, OrderController::$code);
    }
    
}
