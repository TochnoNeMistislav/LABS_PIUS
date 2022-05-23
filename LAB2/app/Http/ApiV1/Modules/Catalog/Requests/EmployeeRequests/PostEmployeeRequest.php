<?php

namespace App\Http\ApiV1\Modules\Catalog\Requests\EmployeeRequests;

use Illuminate\Foundation\Http\FormRequest;

class PostEmployeeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'firstname' => 'max:20',
            'lastname' => 'max:20',
            'phone' => 'max:22',
            'salary' => 'numeric'
        ];
    }
}
