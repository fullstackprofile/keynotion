<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Api\Subscriber\SubscriberRequest;
use App\Models\subscriber;
use Illuminate\Http\Response;

class SubscriberController extends BaseController
{
    /**
     * @param SubscriberRequest $request
     * @return Response
     */
    public function storeSubscriber(SubscriberRequest $request): Response
    {
        $subscriber = subscriber::create($request->validated());

        return response($subscriber, 201);
    }
}

