<?php

namespace App\Http\Resources\Order;

use App\Models\Order;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Order
 */
class OrderOneResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'order_number' => $this->order_number,
            'Subtotal' => $this->Subtotal,
            'VAT' => $this->VAT,
            'Total' => $this->Total,
            'payment_method' => $this->payment_method,
            'status' => $this->status,
            'created_at'=>$this->created_at->format('Y-m-d H:i:s'),
            'company'=> [
                'order_id'=>$this->company->order_id,
                'first_name'=>$this->company->first_name,
                'last_name'=>$this->company->last_name,
                'company_name'=>$this->company->company_name,
                'country_region'=>$this->company->country_region,
                'street_address'=>$this->company->street_address,
                'town_city'=>$this->company->town_city,
                'postcode_zip'=>$this->company->postcode_zip,
                'phone'=>$this->company->phone,
                'email'=>$this->company->email,
                'vat_number'=>$this->company->vat_number,
            ],
            'delegators' => DelegateResource::collection($this->delegaters),
            'order_items' => OrderItemResource::collection($this->order_items),
        ];
    }
}