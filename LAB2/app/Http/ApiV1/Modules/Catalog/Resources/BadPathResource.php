<?php

namespace App\Http\ApiV1\Modules\Catalog\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Domain\Catalog\Models\Customer */

class BadPathResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'data' => null,
            'errors' => [
                'code' => '404',
                'message' => 'NOT FOUND',
                'meta' => null,
            ],
            'meta' => [
    
            ]
        ];
    }
}