<?php

namespace App\Http\Requests\Speaker;

class SpeakerUpdateRequest extends SpeakerStoreRequest
{
    public function authorize()
    {
         return true;
    }
}
