<?php

namespace App\Http\Requests\NewsCategory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class NewsCategoryStoreRequest extends FormRequest
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
            'title' => 'required|unique:news_categories|max:255',
            'slug' => 'unique:news_categories,slug',
        ];
    }
}
