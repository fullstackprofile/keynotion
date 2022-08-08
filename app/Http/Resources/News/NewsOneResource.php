<?php

namespace App\Http\Resources\News;

use App\Models\news;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin news
 */
class NewsOneResource extends JsonResource
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
            'date' => Carbon::parse(strtotime($this->date))->format('d F Y'),
            'category_id' => $this->news_category->id,
            'category' => $this->news_category->title,
            'cover' => $this->getFirstMediaUrl('news_img'),
            'description' => $this->description,
            'item' => $this->item,
        ];
    }
}
