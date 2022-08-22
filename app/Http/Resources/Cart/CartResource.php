<?php

namespace App\Http\Resources\Cart;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */

    public function toArray($request)
    {
        return [
            'items' => !empty($this->items) ? CartItemResource::collection($this->items) : [],
            'discount_total' => $this->discount_total,
            'subtotal' => $this->subtotal,
            'vat' => $this->vat,
            'total' => $this->total,
        ];
    }
}
