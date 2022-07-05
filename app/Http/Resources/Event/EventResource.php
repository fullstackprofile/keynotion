<?php

namespace App\Http\Resources\Event;

use App\Http\Resources\Speaker\SpeakerResource;
use App\Models\Event;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

/**
 * @mixin Event
 */
class EventResource extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'cover' => $this->getFirstMediaUrl('event_img'),
                'category_id'=>$this->category->id,
            'category'=>$this->category->title,
                ]
        ];
    }
}
