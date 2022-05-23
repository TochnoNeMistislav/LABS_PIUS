<?php

namespace App\Http\ApiV1\Modules\Catalog\Controllers;

use App\Http\ApiV1\Modules\Catalog\Controllers\Controller;
use App\Domain\Catalog\Actions\Customer\DeleteCustomerAction;
use App\Domain\Catalog\Actions\Customer\PostCustomerAction;
use App\Domain\Catalog\Actions\Customer\PutCustomerAction;
use App\Domain\Catalog\Actions\Customer\GetCustomerAction;
use App\Domain\Catalog\Actions\Customer\PatchCustomerAction;
use App\Http\ApiV1\Modules\Catalog\Resources\CustomerResource;
use App\Http\ApiV1\Modules\Catalog\Requests\CustomerRequests\PatchCustomerRequest;
use App\Http\ApiV1\Modules\Catalog\Requests\CustomerRequests\PostCustomerRequest;
use App\Http\ApiV1\Modules\Catalog\Requests\CustomerRequests\PutCustomerRequest;

class CustomerController extends Controller
{
    public static string $code = '200';
    public static string $message = 'OK';

    public function patch(int $id, PatchCustomerRequest $request, PatchCustomerAction $action) {
        return new CustomerResource(
            $action->execute($id, $request->validated())
        );
    }

    public function get(int $id, GetCustomerAction $action) {
        $customer = new CustomerResource($action->execute($id));
        $customer->message = CustomerController::$message;
        $customer->code = CustomerController::$code;
        return response()->json($customer, CustomerController::$code);

    }

    public function post(PostCustomerRequest $request, PostCustomerAction $action) {
        $customer = new CustomerResource(
            $action->execute($request->validated())
        );
        return response()->json($customer, 201);
    }
    
    public function delete(int $id, DeleteCustomerAction $action)
    {
        $customer = new CustomerResource($action->execute($id));
        $customer->message = CustomerController::$message;
        $customer->code = CustomerController::$code;
        return response()->json($customer, CustomerController::$code);
    }
    
    public function put(int $id, PutCustomerRequest $request, PutCustomerAction $action) {
        $customer = new CustomerResource(
            $action->execute($id, $request->validated())
        );
        return response()->json($customer, CustomerController::$code);
    }
}
