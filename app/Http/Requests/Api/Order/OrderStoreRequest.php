<?php

namespace App\Http\Requests\Api\Order;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class OrderStoreRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        $this->merge([
            'order_number' => random_int(10000, 99999),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'order_number'=>'unique:orders,order_number',
            'Subtotal'=>'required',
            'VAT'=>'string',
            'Total'=>'required',
            'payment_method'=>'required|string',
            'order_id'=>'required',
            'ticket_id'=>'required|exists:tickets,id',
            'ticket_title'=>'required|string',
            'quantity'=>'required|int',
            'price'=>'required',
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'company_name'=>'required|string',
            'country_region'=>'required|string',
            'street_address'=>'required|string',
            'town_city'=>'required|string',
            'postcode_zip'=>'required|string',
            'phone'=>'required|string',
            'email'=>'required|string',
            'full_name'=>'required|string',
            'job_title'=>'required|string',
        ];
    }
}
