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
            'address' => 'max:256',
            'small_description' => 'max:256',
            'about_info' => 'string',
            'category_id' => 'exists:categories,id',
            'speakers' => 'array|exists:speakers,id',
            'key_topics' => 'array',
            'key_topics.*.title' => 'max:256',
            'key_topics.*.description' => 'max:256',
            'vip_tour' => 'array|',
            'vip_tour.*.date' => 'max:256',
            'vip_tour.*.description' => 'max:256',
            'key_takeaway' => 'array|',
            'key_takeaway.*.item' => 'max:256',
            'attenders' => 'array|exists:attenders,id',
            'sponsors' => 'array|exists:sponsors,id',
            'partners' => 'array|exists:partners,id',
            'places' => 'max:256',
        ];
    }
}
