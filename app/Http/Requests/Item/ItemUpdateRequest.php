<?php

namespace App\Http\Requests\Item;

class ItemUpdateRequest extends ItemStoreRequest
{
    public function rules()
    {
        return [
            'title' => 'max:255',
        ];
    }
}
