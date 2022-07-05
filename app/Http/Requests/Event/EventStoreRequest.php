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
       // dd($this->all());
        return [
            'title' => 'required',
            'slug'=>'unique:events,slug',
            'start_date' => 'required',
            'end_date' => 'required',
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required|exists:cities,id',
            'state_id' => 'required|exists:states,id',
            'address' => 'required',
            'small_description' => 'max:5000',
            'about_info' => 'required',
            'cover_img' => 'file',
            'about_img' => 'file',
            'category_id' => 'required|exists:categories,id',
            'speakers' => 'required|array|exists:speakers,id',
            'key_topics' => 'array',
            'key_topics.*.title' => 'max:256',
            'key_topics.*.description' => 'max:256',
            'vip_tour' => 'array',
            'vip_tour.*.date' => 'max:256',
            'vip_tour.*.description' => 'max:5000',
            'key_takeaway' => 'array|',
            'key_takeaway.*.item' => 'max:256',
            'attenders' => 'required|array|exists:attenders,id',
            'sponsors' => 'required|array|exists:sponsors,id',
            'partners' => 'required|array|exists:partners,id',
            'places' => 'required',
        ];
    }
}
