<?php

namespace App\Http\ApiV1\Modules\Catalog\Requests\OrderRequests;

use Illuminate\Foundation\Http\FormRequest;

class PatchOrderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'employee_id' => 'exists:employees,id',
            'customer_id' => 'exists:customers,id',
            'description' => 'max:18',
            'ship_to_date' => 'date_format:Y-m-d',
            'addres' => 'max:10',
            'amount_paid' => 'numeric|min:1'
        ];
    }
}
