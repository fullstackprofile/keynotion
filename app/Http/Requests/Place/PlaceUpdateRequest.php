<?php

namespace App\Http\Requests\Place;

use Illuminate\Foundation\Http\FormRequest;

class PlaceUpdateRequest extends FormRequest
{

    public function rules()
    {
        return [
            'title' => 'max:255',
        ];
    }
}
