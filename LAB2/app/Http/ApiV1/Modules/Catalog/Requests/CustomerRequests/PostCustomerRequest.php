<?php

namespace App\Http\ApiV1\Modules\Catalog\Requests\CustomerRequests;

use Illuminate\Foundation\Http\FormRequest;

class PostCustomerRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'string|max:10',
            'addres' => 'string|max:64',
            'phone' => 'string|max:12',
            'FAX' =>'string|max:10',
        ];
    }
}
