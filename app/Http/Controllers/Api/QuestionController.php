<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Api\Question\QuestionRequest;
use App\Models\question;
use App\Models\user;
use App\Notifications\QuestionNotification;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Notification;

class QuestionController extends BaseController
{
    /**
     * @param QuestionRequest $request
     * @return Response
     */

    public function StoreQuestion(QuestionRequest $request): Response
    {

        $question = question::create($request->validated());
        /** @var User $admin */
        $admin = User::where('role', 'admin')->orWhere('email','info@key-notion.com')->get()->each(function (User $user) use ($question) {
            $user->notify( new QuestionNotification($question));
        });

        return response($question, 201);
    }
}
