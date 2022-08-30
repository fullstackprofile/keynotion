<?php

namespace App\Http\Requests\Api\BillingAddress;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBillingAddressRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'country_region'=>'string',
            'street_address'=>'string',
            'town_city'=>'string',
            'postcode_zip'=>'string',
        ];
    }
}
