<?php

namespace App\Http\Requests\Type;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class TypeStoreRequest extends FormRequest
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
            'slug'=>'unique:types,slug',
        ];
    }
}
