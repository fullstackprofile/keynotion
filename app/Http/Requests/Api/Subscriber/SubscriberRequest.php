<?php

namespace App\Http\Requests\Api\Subscriber;

use Illuminate\Foundation\Http\FormRequest;


class SubscriberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'email'=>'unique:subscribers,email',
        ];
    }
}
