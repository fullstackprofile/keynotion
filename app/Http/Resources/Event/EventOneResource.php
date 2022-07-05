<?php

namespace App\Http\Resources\Event;

use App\Http\Resources\Attender\AttenderResource;
use App\Http\Resources\Partner\PartnerResource;
use App\Http\Resources\Place\PlaceResource;
use App\Http\Resources\Speaker\SpeakerResource;
use App\Http\Resources\Sponsor\SponsorResource;
use App\Models\Event;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

/**
 * @mixin Event
 */
class EventOneResource extends JsonResource
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
            'title' => $this->title,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'small_description' => $this->small_description,
            'cover' => $this->getFirstMediaUrl('event_img'),
            'category'=>$this->category->title,
            'country'=>$this->country->name,
            'state'=>$this->state->name,
            'city'=>$this->city->name,
            'speakers' => SpeakerResource::collection($this->speakers),
            'cover_about' => $this->getFirstMediaUrl('event_about_img'),
            'about'=>$this->about_info,
            'key_topics'=>$this->key_topics,
            'vip_tour'=>$this->vip_tour,
            'attenders'=>AttenderResource::collection($this->attenders),
            'key_takeaway'=>$this->key_takeaway,
            'sponsors'=>SponsorResource::collection($this->sponsors),
            'partners'=>PartnerResource::collection($this->partners),
            'the_venue' => PlaceResource::collection($this->places),
        ];
    }
}
