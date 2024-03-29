<?php

namespace App\Http\Requests\Api\EventQuestion;

use Illuminate\Foundation\Http\FormRequest;

class EventQuestionRequest extends FormRequest
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
            'email'=>'required:event_questions,email',
            'name'=>'required|string',
            'number'=>'required|string',
            'message'=>'required|string',
        ];
    }
}
