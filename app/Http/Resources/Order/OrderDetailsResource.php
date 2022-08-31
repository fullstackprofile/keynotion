<?php

namespace App\Http\Resources\Order;

use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailsResource extends JsonResource
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
            'order_number'=>$this->order_number,
            'created_at'=>Carbon::parse(strtotime($this->created_at))->format('d F Y'),
            'status'=>$this->status,
            'total'=>$this->Total,
        ];
    }
}
