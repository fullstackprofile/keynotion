<?php

namespace App\Http\Resources\Order;

use App\Models\OrderItem;
use App\Models\otherType;
use App\Models\ticket;
use App\Models\type;
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
        $ticket=ticket::whereId($this->ticket_id)->first();
        $type=type::where('id',$ticket->type_id)->first();
        $other_type=otherType::where('id',$ticket->other_type_id)->first();

        return [
            'id'=>$this->id,
            'order_id'=>$this->order_id,
            'ticket_id'=>$this->ticket_id,
            'ticket_title'=>$this->ticket_title,
            'type'=>$type->title,
            'other_type'=>$other_type->title,
            'quantity'=>$this->quantity,
            'price'=>$this->price,
        ];
    }
}
