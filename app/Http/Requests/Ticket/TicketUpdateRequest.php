<?php

namespace App\Http\Requests\Ticket;

class TicketUpdateRequest extends TicketStoreRequest
{

    public function rules()
    {
        return [
            'items' => 'array|exists:items,id',
            'type_id' => 'exists:types,id',
            'other_type_id' => 'exists:other_types,id',
            'price'=>'max:255',
            'sale'=>'max:255',
            'currency'=>'required|max:11',
            'event_id' => 'required|exists:events,id',
        ];
    }
}
