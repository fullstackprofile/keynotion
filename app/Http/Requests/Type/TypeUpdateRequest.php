<?php

namespace App\Http\Requests\Type;

class TypeUpdateRequest extends TypeStoreRequest
{

    public function rules()
    {
        return [
            'title' => 'max:255',
        ];
    }
}
