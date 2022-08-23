<?php

namespace App\Http\Requests\Coupon;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CouponStoreRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        $this->merge([
            'code' =>  Str::random(8),
        ]);
    }

    public function rules()
    {
        return [
            'code' => 'unique:coupons,code',
            'discount'=>'required|string',
            'percent_amount'=>'required|string',
            'user'=>'required|string',
            'email'=>'required|string',
            'creation_date'=>'required|string',
            'expiration_date'=>'required|string',
        ];
    }
}
