<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
{

    public function rules()
    {
        return [
            'title' => 'max:255',
        ];
    }
}
