<?php

namespace App\Http\Resources\Testimonial;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class TestimonialResource extends JsonResource
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
            [
                'id'=>$this->id,
                'star'=>$this->star,
                'full_name'=>$this->full_name,
                'profession'=>$this->profession,
                'position'=>$this->heading,
                'company'=>$this->company,
                'cover' => $this->getFirstMediaUrl('testimonial_logo'),
            ]
        ];
    }
}
