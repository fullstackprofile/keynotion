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
            'question' => 'array',
            'news_img' => 'file',
            'item.*.action' => 'string',
            'item.*.answer' => 'string',
        ];
    }
}
