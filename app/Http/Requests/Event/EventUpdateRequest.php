<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;

class EventUpdateRequest extends FormRequest
{

    public function rules()
    {
        return [
            'title' => 'max:256',
            'country_id' => 'exists:countries,id',
            'city_id' => 'exists:cities,id',
            'state_id'=>'exists:states,id',
            'start_date' => 'date',
            'end_date' => 'date',
            'address' => 'string',
            'small_description' => 'string',
            'cover_img' => 'file',
            'about_img' => 'file',
            'about_info' => 'string',
            'key_topic_img' => 'file',
            'vip_tour_img' => 'file',
            'category_id' => 'exists:categories,id',
            'speakers' => 'array|exists:speakers,id',
            'key_topics' => 'array',
            'key_topics.*.title' => 'string',
            'key_topics.*.description' => 'string',
            'vip_tour' => 'array|',
            'vip_tour.*.date' => 'max:5000',
            'vip_tour.*.description' => 'string',
            'key_takeaway' => 'array|',
            'key_takeaway.*.item' => 'string',
            'attenders' => 'array|exists:attenders,id',
            'sponsors' => 'array|exists:sponsors,id',
            'partners' => 'array|exists:partners,id',
            'places' => 'max:256',
        ];
    }
}
