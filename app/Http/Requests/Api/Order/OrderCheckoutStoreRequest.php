<?php

namespace App\Http\Requests\Api\Order;

//use App\Models\Address;
//use App\Models\Gateway;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderCheckoutStoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
//        $gateway = Gateway::whereId($this->gateway_id)->first();

        return [
            'items' => 'required|array',
            'shipping_id' => [
                'int',
                'required',
//                Rule::exists('addresses', 'id')->where('type', Address::TYPE_SHIPPING),
            ],
            'gateway_id' => [
                'required',
                'int',
//                Rule::exists('gateways', 'id'),
            ],
            'payment_card_id' => [
                'int',
//                Rule::requiredIf($gateway->type === Gateway::TYPE_CC),
//                Rule::exists('payment_cards', 'id'),
            ],
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|min:1',
        ];
    }
}
