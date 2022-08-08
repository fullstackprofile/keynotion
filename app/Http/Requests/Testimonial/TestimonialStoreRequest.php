<?php

namespace App\Http\Requests\Testimonial;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialStoreRequest extends FormRequest
{

    public function rules()
    {
        return [
            'full_name'=>'required',
            'profession'=>'required',
            'logo' => 'file',
            'heading'=>'required',
            'company'=>'required',
            'testimonial'=>'string',
            'star'=>'numeric'
        ];
    }
}
