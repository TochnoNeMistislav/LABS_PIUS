<?php
namespace App\Http\ApiV1\Modules\Catalog\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\ApiV1\Modules\Catalog\Controllers\CustomerController;

/** @mixin \App\Domain\Catalog\Models\Customer */

class CustomerResource extends JsonResource
{
    public function toArray($request)
    {
      
       
        return [
            'data' => [
                'id' => $this->id,
                'name' => $this->name,
                'addres' => $this->addres,
                'phone' => $this->phone,
                'FAX' => $this->FAX,
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