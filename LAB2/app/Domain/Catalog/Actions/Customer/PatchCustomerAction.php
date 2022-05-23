<?php

namespace App\Domain\Catalog\Actions\Customer;
use App\Domain\Catalog\Models\Customer;
use App\Http\ApiV1\Modules\Catalog\Controllers\CustomerController;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class PatchCustomerAction
{
    public function execute(int $customerId, array $fields): Customer
    {
        
        $customer = Customer::findOrFail($customerId);
        $customer->update($fields);
    
        return $customer;
    }

}