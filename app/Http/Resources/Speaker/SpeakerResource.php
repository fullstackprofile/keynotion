<?php

namespace App\Http\Resources\Speaker;

use App\Models\speaker;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

/**
 * @mixin speaker
 */
class SpeakerResource extends JsonResource
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
            'full_name' => $this->full_name,
            'avatar' => $this->getFirstMediaUrl('speaker_avatar'),
            'profession'=> $this->profession,
            'company'=> $this->company,
            'company_logo' => $this->getFirstMediaUrl('company_logo'),
            'linkedin'=>$this->linkedin,
        ];
    }
}
