<?php

namespace App\Http\Requests\Sponsor;

class SponsorUpdateRequest extends SponsorStoreRequest
{

    public function rules()
    {
        return [
            'name' => 'max:255',
        ];
    }
}
