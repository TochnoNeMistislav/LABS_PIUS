<?php

namespace App\Domain\Catalog\Actions\Customer;
use App\Domain\Catalog\Models\Customer;
use App\Http\ApiV1\Modules\Catalog\Controllers\CustomerController;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class GetCustomerAction
{
    public function execute(int $customerId): Customer
    {
        $customer = Customer::findOrFail($customerId);
       
        return $customer;
    }

}