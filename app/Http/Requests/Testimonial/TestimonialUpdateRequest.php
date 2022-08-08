<?php

namespace App\Http\Requests\Testimonial;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialUpdateRequest extends FormRequest
{

    public function rules()
    {
        return [
            'full_name'=>'string',
            'profession'=>'string',
            'logo' => 'file',
            'heading'=>'string',
            'company'=>'string',
            'testimonial'=>'string',
            'star'=>'numeric'
        ];
    }
}
