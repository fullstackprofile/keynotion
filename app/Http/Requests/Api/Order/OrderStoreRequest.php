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
            'status'=>'string',
            'user_id'=>'exists:users,id',
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'company_name'=>'required|string',
            'country_region'=>'required|string',
            'street_address'=>'required|string',
            'town_city'=>'required|string',
            'postcode_zip'=>'required|string',
            'phone'=>'required|string',
            'email'=>'required|string',
            'order_items'=>'required|array',
            'order_items.*.ticket_id'=>'required|exists:tickets,id',
            'order_items.*.quantity'=>'required',
            'delegaters'=>'required|array',
            'delegaters.*.ticket_id'=>'required|exists:tickets,id',
            'delegaters.*.full_name'=>'required',
            'delegaters.*.job_title'=>'required',
            'delegaters.*.email'=>'required',
        ];
    }
}
