<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'country' => 'required',
            'city' => 'required',
            'address' => 'required',
            'small_description' => 'required',
            'cover_img' => 'file',
            'category_id' => 'required|exists:categories,id',
            'speakers' => 'required|array|exists:speakers,id',
        ];
    }
}
