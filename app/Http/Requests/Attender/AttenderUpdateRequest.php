<?php

namespace App\Http\Requests\Attender;

use Illuminate\Foundation\Http\FormRequest;

class AttenderUpdateRequest extends FormRequest
{

    public function rules()
    {
        return [
            'title' => 'max:255',
        ];
    }
}
