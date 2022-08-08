<?php

namespace App\Http\Requests\OtherType;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class OtherTypeStoreRequest extends FormRequest
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
            'slug'=>'unique:other_types,slug',
        ];
    }
}
