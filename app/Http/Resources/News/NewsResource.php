<?php

namespace App\Http\Resources\News;

use App\Models\News;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;


/**
 * @mixin News
 */
class NewsResource extends JsonResource
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
                'title'=>$this->title,
                'date'=>$this->date,
                'cover' => $this->getFirstMediaUrl('news_img'),
            ]
        ];
    }
}
