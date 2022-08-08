<?php

namespace App\Http\Requests\Ticket;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class TicketStoreRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::random(5),
        ]);
    }

    public function rules()
    {
        return [
            'slug'=>'unique:tickets,slug',
            'type_id' => 'required|exists:types,id',
            'other_type_id' => 'exists:other_types,id',
            'price'=>'required',
            'sale'=>'max:255',
            'currency'=>'required|max:11',
            'items' => 'required|array|exists:items,id',
            'event_id' => 'required|exists:events,id',
            'attractive'=>'boolean',
        ];
    }
}
