<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\EventQuestion\EventQuestionRequest;
use App\Models\eventQuestion;
use App\Models\user;
use App\Notifications\EventQuestionNotification;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Notification;

class EventQuestionController extends BaseController
{
    /**
    * @param EventQuestionRequest $request
    * @return Response
    */

    public function StoreEventQuestion(EventQuestionRequest $request): Response
    {
        $question = eventQuestion::create($request->validated());
        /** @var User $admin */
        $admin = User::where('email','info@key-notion.com')->get()->each(function (User $user) use ($question) {
            $user->notify( new EventQuestionNotification($question));
        });
        return response($question, 201);
    }

}
