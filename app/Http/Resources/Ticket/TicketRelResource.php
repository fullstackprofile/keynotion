<?php

namespace App\Http\Resources\Ticket;

use App\Http\Resources\Event\EventOneResource;
use App\Http\Resources\Item\ItemResource;
use App\Models\event;
use App\Models\ticket;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

/**
 * @mixin ticket
 */
class TicketRelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        $price=[
            $this->price,
            $this->sale,
        ];

            return [
                'id' => $this->id,
                'slug' => $this->slug,
                'event_id'=>$this->event->id,
                'event_title'=>$this->event->title,
                'event_cover'=>$this->event->getFirstMediaUrl('event_img'),
                'min_price'=>str(min($price)),
                'max_price'=>str(max($price)),
                'currency'=>$this->currency,
            ];
        }
}
