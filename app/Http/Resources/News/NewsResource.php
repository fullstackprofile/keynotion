<?php

namespace App\Http\Resources\News;

use App\Models\news;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;


/**
 * @mixin news
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
                'id'=>$this->id,
                'title'=>$this->title,
                'category_id'=>$this->news_category->id,
                'category'=>$this->news_category->title,
                'date'=>Carbon::parse(strtotime($this->date))->format('d F Y'),
                'cover' => $this->getFirstMediaUrl('news_img'),
        ];
    }
}
