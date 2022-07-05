<?php

namespace App\Http\Requests\Speaker;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class SpeakerStoreRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->input('full_name')),
        ]);
    }

    public function rules()
    {
        return [
            'full_name'=>'required',
            'slug'=>'unique:sponsors,slug',
            'avatar' => 'file',
            'company_logo' => 'file',
            'profession'=>'required',
            'company'=>'required',
        ];
    }
}
