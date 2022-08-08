<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class NewsStoreRequest extends FormRequest
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
            'slug'=>'unique:news,slug',
            'news_category_id'=>'exists:news_categories,id',
            'description' => 'required:string',
            'question' => 'array',
            'news_img' => 'file',
            'date'=>'date',
            'item.*.action' => 'string',
            'item.*.answer' => 'string',
        ];
    }
}
