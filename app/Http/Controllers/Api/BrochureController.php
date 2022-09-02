<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Brochure\BrochureStoreRequest;
use App\Models\brochure;
use App\Models\User;
use App\Notifications\BrochureRequestNotification;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Notification;


class BrochureController extends BaseController
{
    /**
     * @param BrochureStoreRequest $request
     * @return Response
     */
    public function storeBrochure(BrochureStoreRequest $request):Response
    {
        $brochure = brochure::create($request->validated());
        /** @var User $admin */
        $admin = User::where('email','agenda@key-notion.com')->get()->each(function (User $user) use ($brochure) {
            $user->notify(new BrochureRequestNotification($brochure));
        });
        return response($brochure, 201);
    }
}
