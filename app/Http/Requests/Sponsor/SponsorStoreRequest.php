<?php

namespace App\Http\Requests\Sponsor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class SponsorStoreRequest extends FormRequest
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
            'name' => 'required|unique:sponsors|max:255',
            'logo'=>'required|file',
            'slug'=>'unique:sponsors,slug',
        ];
    }
}
