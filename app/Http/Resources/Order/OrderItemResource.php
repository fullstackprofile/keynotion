<?php

namespace App\Http\Resources\Order;

use App\Models\OrderItem;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin OrderItem
 */
class OrderItemResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'order_id'=>$this->order_id,
            'ticket_id'=>$this->ticket_id,
            'ticket_title'=>$this->ticket_title,
            'quantity'=>$this->quantity,
            'currency'=>$this->currency,
            'price'=>$this->price,
        ];
    }
}
