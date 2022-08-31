<?php

namespace App\Http\Resources\BillingAddress;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BillingAddressResource extends JsonResource
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
//            'country_region'=>$this->company->country_region,
            'street_address'=>$this->company->street_address,
            'town_city'=>$this->company->town_city,
            'postcode_zip'=>$this->company->postcode_zip,
        ];
    }
}
