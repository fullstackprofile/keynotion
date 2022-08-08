<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class NewsUpdateRequest extends NewsStoreRequest
{

    public function rules()
    {
        return [
            'title' => 'string',
            'description' => 'string',
            'news_category_id'=>'exists:news_categories,id',
            'question' => 'array',
            'news_img' => 'file',
            'item.*.action' => 'string',
            'item.*.answer' => 'string',
            'date'=>'date'
        ];
    }
}
