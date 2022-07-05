<?php

namespace App\Http\Requests\Vacancy;

use Illuminate\Foundation\Http\FormRequest;

class VacancyUpdateRequest extends VacancyStoreRequest
{

    public function rules()
    {
        return [
            'title' => 'required',
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
