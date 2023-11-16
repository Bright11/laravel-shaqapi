<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>(string)$this->id,
            'attributes'=>[
                'name'=>$this->name,
                'description'=>$this->description,
                'qty'=>$this->qty,
                'unit_price'=>$this->unit_price,
                'amount'=>$this->amount
            ]
        ];
    }
}
