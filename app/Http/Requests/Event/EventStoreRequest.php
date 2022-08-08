<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class EventStoreRequest extends FormRequest
{


    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->input('title')),
        ]);
    }

    public function rules()
    {

        return [
            'title' => 'required',
            'slug'=>'unique:events,slug',
            'start_date' => 'date',
            'end_date' => 'date',
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required|exists:cities,id',
            'state_id' => 'required|exists:states,id',
            'address' => 'required',
            'small_description' => 'string',
            'about_info' => 'required',
            'cover_img' => 'file',
            'about_img' => 'file',
            'key_topic_img' => 'file',
            'vip_tour_img' => 'file',
            'category_id' => 'required|exists:categories,id',
            'speakers' => 'required|array|exists:speakers,id',
            'key_topics' => 'required|array',
            'key_topics.*.title' => 'string',
            'key_topics.*.description' => 'string',
            'vip_tour' => 'required|array',
            'vip_tour.*.date' => 'required',
            'vip_tour.*.description' => 'string',
            'key_takeaway' => 'required|array',
            'key_takeaway.*.item' => 'string',
            'attenders' => 'required|array|exists:attenders,id',
            'sponsors' => 'required|array|exists:sponsors,id',
            'partners' => 'required|array|exists:partners,id',
            'places' => 'required',
        ];
    }
}
