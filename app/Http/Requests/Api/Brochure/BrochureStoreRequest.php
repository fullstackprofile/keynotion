<?php

namespace App\Http\Requests\Api\Brochure;

use Illuminate\Foundation\Http\FormRequest;

class BrochureStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|string',
            'surname'=>'required|string',
            'company_name'=>'required|string',
            'job_title'=>'required|string',
            'phone'=>'required|string',
            'corporate_email'=>'required:applied_speakers,email',
            'country'=>'required|string',
            'summit_name'=>'required|string',
            'comment'=>'required|string',
            'learn'=>'string',
            'other'=>'string',
        ];
    }
}
