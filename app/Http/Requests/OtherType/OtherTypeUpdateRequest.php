<?php

namespace App\Http\Requests\OtherType;

class OtherTypeUpdateRequest extends OtherTypeStoreRequest
{

    public function rules()
    {
        return [
            'title' => 'max:255',
        ];
    }
}
