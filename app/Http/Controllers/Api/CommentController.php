<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Api\Comment\CommentRequest;
use App\Http\Resources\Comment\CommentResource;
use App\Models\comment;
use App\Models\user;
use App\Notifications\CommentNotification;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Notification;

class CommentController extends BaseController
{
    /**
     * @param CommentRequest $request
     * @return Response
     */
    public function storeComment(CommentRequest $request): Response
    {
        $comment = comment::create($request->validated());
        /** @var User $admin */
        $admin = User::where('role', 'admin')->get()->each(function (User $user) use ($comment) {
            $user->notify(new CommentNotification($comment));
        });
        return response($comment, 201);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request): mixed
    {

        return $this->render(
            CommentResource::collection(comment::query()
                ->when(
                    $request->has('news_id'), fn($builder) => $builder->where('news_id', '=', $request->news_id)
                )
                ->where('approve', '=', 1)
                ->take(3)
                ->get()
            )
        );
    }

}
