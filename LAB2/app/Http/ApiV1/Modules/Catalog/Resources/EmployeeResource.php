<?php
namespace App\Http\ApiV1\Modules\Catalog\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\ApiV1\Modules\Catalog\Controllers\EmployeeController;

/** @mixin \App\Domain\Catalog\Models\Employee */

class EmployeeResource extends JsonResource
{
    public function toArray($request)
    {
       
        return [
            'data' => [
                'id' => $this->id,
                'firstname' => $this->firstname,
                'lastname' => $this->lastname,
                'phone' => $this->phone,
                'salary' => $this->salary,
                ],
            'errors' => [
                'code' => $this->code,
                'message' => $this->message,
                'meta' => $this->meta,
            ],
            'meta' => []
            ];
    }
}