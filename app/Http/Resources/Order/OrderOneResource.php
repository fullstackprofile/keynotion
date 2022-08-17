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
            'Subtotal' => $this->Subtotal,
            'VAT' => $this->VAT,
            'Total' => $this->Total,
            'payment_method' => $this->payment_method,
            'order_number' => $this->order_number,
            'status' => $this->status,
            'company_order_id'=>$this->company->order_id,
            'company_first_name'=>$this->company->first_name,
            'company_last_name'=>$this->company->last_name,
            'company_company_name'=>$this->company->company_name,
            'company_country_region'=>$this->company->country_region,
            'company_street_address'=>$this->company->street_address,
            'company_town_city'=>$this->company->town_city,
            'company_postcode_zip'=>$this->company->postcode_zip,
            'company_phone'=>$this->company->phone,
            'company_email'=>$this->company->email,
            'company_vat_number'=>$this->company->vat_number,
            'delegators' => DelegateResource::collection($this->delegaters),
            'order_items' => OrderItemResource::collection($this->order_items),
        ];
    }
}
