<?php

namespace App\Http\Resources\Comment;

use App\Models\comment;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

/**
 * @mixin comment
 */
class CommentResource extends JsonResource
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
                    'news_id'=>$this->news_id,
                    'name' => $this->name,
                    'email' => $this->email,
                    'comment' => $this->comment,
                    'website' => $this->website,
                ]
            ];
        }
}
