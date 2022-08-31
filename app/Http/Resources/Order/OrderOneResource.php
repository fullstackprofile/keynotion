<?php

namespace App\Http\Resources\Order;

use App\Models\Order;
use Carbon\Carbon;
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
            'user_id'=>$this->user_id,
            'created_at'=>Carbon::parse(strtotime($this->created_at))->format('d F Y'),
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
            ],
            'order_items' => OrderItemResource::collection($this->order_items),
            'delegators' => DelegateResource::collection($this->delegaters),
        ];
    }
}
