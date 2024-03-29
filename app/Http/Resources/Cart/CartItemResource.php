<?php

namespace App\Http\Resources\Cart;

use App\Models\event;
use App\Models\ticket;
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
        $ticket=ticket::where('id',$this->ticket_id)->first();
        $event=event::where('id',$ticket->event_id)->first();

        return [
            'ticket_id' => $this->ticket_id,
            'title'=>$event->title,
            'type'=>$ticket->type->title,
            'other_type'=>$ticket->othertype->title,
            'price' => $this->price,
            'count' => $this->count,
        ];
    }
}
