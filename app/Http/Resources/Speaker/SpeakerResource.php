<?php

namespace App\Http\Resources\Speaker;

use App\Models\Speaker;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

/**
 * @mixin Speaker
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
            'company_logo' => $this->getFirstMediaUrl('company_logo'),
        ];
    }
}
