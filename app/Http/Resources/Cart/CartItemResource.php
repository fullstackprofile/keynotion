<?php

namespace App\Http\Resources\Cart;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartItemResource extends JsonResource
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
            //temporary delete below line
            'ticket_id' => $this->ticket_id,

            'quantity' => $this->quantity,
            //todo fix
            //after model fix below lines
            /*
            'id' => $this->id,
            'type' => $this->type,
            'name' => $this->name,
            'slug' => $this->slug,
            'short_description' => $this->short_description,
            'price' => $this->price,
            'sale_price' => $this->sale_price,
            'cover' => $this->getImageUrl('gallery'),
            */
        ];
    }
}
