<?php

namespace App\Http\Requests\NewsCategory;

class NewsCategoryUpdateRequest extends NewsCategoryStoreRequest
{

    public function rules()
    {
        return [
            'title' => 'max:255',
        ];
    }
}
