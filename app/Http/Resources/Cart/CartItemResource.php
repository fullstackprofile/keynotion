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
            'title' => $this->title,
            'ticket_id' => $this->ticket_id,
            'price' => $this->price,
            'count' => $this->count,
            //todo fix
            //after model fix below lines
            /*
            'id' => $this->id,
            'type' => $this->type,
            'slug' => $this->slug,
            'short_description' => $this->short_description,

            'sale_price' => $this->sale_price,
            'cover' => $this->getImageUrl('gallery'),
            */
        ];
    }
}
