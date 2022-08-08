<?php

namespace App\Http\Requests\Api\Order;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Collection;

class OrderCartUpdateRequest extends FormRequest
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
        return collect([
//            'ticket_id' => 'required|exists:tickets,id',
            'quantity' => 'required|min:1',
        ])->when(! auth()->check(), function (Collection $collection) {
            return $collection->put('cart_id', 'required');
        })->toArray();
    }
}
