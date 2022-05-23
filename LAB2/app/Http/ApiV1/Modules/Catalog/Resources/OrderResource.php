<?php
namespace App\Http\ApiV1\Modules\Catalog\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\ApiV1\Modules\Catalog\Controllers\OrderController;

/** @mixin \App\Domain\Catalog\Models\Order */

class OrderResource extends JsonResource
{
    public function toArray($request)
    {

        return [
            'data' => [
                'id' => $this->id,
                'employee_id' => $this->employee_id,
                'customer_id' => $this->customer_id,
                'description' => $this->description,
                'ship_to_date' => $this->ship_to_date,
                'addres' => $this->addres,
                'amount_paid' => $this->amount_paid,
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