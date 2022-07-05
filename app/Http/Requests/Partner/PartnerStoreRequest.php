<?php

namespace App\Http\Requests\Partner;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PartnerStoreRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->input('name')),
        ]);
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:partners|max:255',
            'logo'=>'required|file',
            'slug'=>'unique:partners,slug',
        ];
    }
}
