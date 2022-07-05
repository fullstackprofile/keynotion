<?php

namespace App\Http\Requests\Attender;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class AttenderStoreRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->input('title')),
        ]);
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'slug'=>'unique:attenders,slug',
        ];
    }
}
