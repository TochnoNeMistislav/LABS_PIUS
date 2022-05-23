<?php


namespace App\Domain\Catalog\Actions\Customer;
use App\Domain\Catalog\Models\Customer;
use App\Http\ApiV1\Modules\Catalog\Controllers\CustomerController;
class PostCustomerAction
{
    public function execute(array $fields): Customer
    {

        $customer = Customer::create($fields);

        return $customer;
    }

}