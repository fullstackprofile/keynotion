<?php

namespace App\Http\Resources\Order;

use App\Models\Delegate;
use App\Models\otherType;
use App\Models\ticket;
use App\Models\type;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


/**
 * @mixin Delegate
 */
class DelegateResource extends JsonResource
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
            'ticket_id'=>$this->ticket_id,
            'ticket_title'=>$ticket->event->title,
            'type'=>$type->title,
            'other_type'=>$other_type->title,
            'order_id'=>$this->order_id,
            'full_name'=>$this->full_name,
            'job_title'=>$this->job_title,
            'email'=>$this->email,
        ];
    }
}
