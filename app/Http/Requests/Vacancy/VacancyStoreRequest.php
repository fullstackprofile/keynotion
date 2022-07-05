<?php

namespace App\Http\Requests\Vacancy;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class VacancyStoreRequest extends FormRequest
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
            'slug'=>'unique:events,slug',
            'job_description' => 'required:string',
            'about_role' => 'array',
            'about_role.*.item' => 'max:256',
            'looking_for' => 'array',
            'looking_for.*.item' => 'max:256',
            'benefits' => 'array',
            'benefits.*.item' => 'max:256',
        ];
    }
}
