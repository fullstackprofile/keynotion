<?php

namespace App\Http\Requests\Partner;

class PartnerUpdateRequest extends PartnerStoreRequest
{
    public function rules()
    {
        return [
            'name' => 'max:255',
        ];
    }
}
