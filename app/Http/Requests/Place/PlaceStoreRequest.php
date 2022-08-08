<?php

namespace App\Http\Requests\Place;

use Illuminate\Foundation\Http\FormRequest;

class PlaceStoreRequest extends FormRequest
{


    public function rules()
    {
        return [
            'title' => 'required|unique:places|max:255',
            'address'=>'required:places|max:255',
            'cover'=>'required|file',
            'logo'=>'required|file',
            'latitude'=>'required',
            'longitude'=>'required',
        ];
    }
}
