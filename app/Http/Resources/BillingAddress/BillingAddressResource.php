<?php

namespace App\Http\Resources\BillingAddress;

use App\Models\CompanyDetails;
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
        $address=CompanyDetails::where('order_id',$this->id)->first();
        return [
//            'country_region'=>$this->company->country_region,
            'street_address'=>$address->street_address,
            'town_city'=>$address->town_city,
            'postcode_zip'=>$address->postcode_zip,
        ];
    }
}
