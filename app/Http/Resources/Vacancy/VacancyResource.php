<?php

namespace App\Http\Resources\Vacancy;


use App\Models\vacancy;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin vacancy
 */
class VacancyResource extends JsonResource
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
                'slug' => $this->slug,
                'title'=>$this->title,
                'job_description'=>$this->job_description,
                'about_role'=>$this->about_role,
                'looking_for'=>$this->looking_for,
                'benefits'=>$this->benefits,
            ]
        ];
    }
}
