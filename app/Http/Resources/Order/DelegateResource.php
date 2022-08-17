<?php

namespace App\Http\Resources\Order;

use App\Models\Delegate;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


/**
 * @mixin Delegate
 */
class DelegateResource extends JsonResource
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
            'id'=>$this->id,
            'order_id'=>$this->order_id,
            'full_name'=>$this->full_name,
            'job_title'=>$this->job_title,
            'email'=>$this->email,
        ];
    }
}
