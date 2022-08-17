<?php

namespace App\Http\Requests\Coupon;

use Illuminate\Foundation\Http\FormRequest;

class CouponUpdateRequest extends FormRequest
{

    public function rules()
    {
        return [
            'discount'=>'string',
            'percent_amount'=>'string',
            'user'=>'string',
            'email'=>'string',
            'creation_date'=>'string',
            'expiration_date'=>'string',
        ];
    }
}
