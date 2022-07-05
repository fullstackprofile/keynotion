<?php

namespace App\Http\Resources\Ticket;

use App\Http\Resources\Item\ItemResource;
use App\Models\Ticket;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

/**
 * @mixin Ticket
 */
class TicketResource extends JsonResource
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
            [
                'id' => $this->id,
                'slug' => $this->slug,
                'price'=>$this->price,
                'sale'=>$this->sale,
                'currency'=>$this->currency,
                'items' => ItemResource::collection($this->items),
                'event_id'=>$this->event->id,
                'type'=>$this->type->title,
                'other_type'=>$this->othertype->title,
            ]
        ];
    }
}
