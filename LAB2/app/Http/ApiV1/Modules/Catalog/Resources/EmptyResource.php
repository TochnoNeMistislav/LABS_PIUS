<?php
namespace App\Http\ApiV1\Modules\Catalog\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\ApiV1\Modules\Catalog\Controllers\CustomerController;

/** @mixin \App\Domain\Catalog\Models\Customer */

class EmptyResource extends JsonResource
{
    public function toArray($request)
    {
      
        
        return [
            'data' => [
                // 'id' => null,
                // 'name' => null,
                // 'addres' => null,
                // 'phone' => null,
            ],
            'errors' => [
                'code' => CustomerController::$code,
                'message' => CustomerController::$message,
                'meta' => null,
            ],
            'meta' => []
            ];
     
    }
}