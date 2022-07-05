<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\Event\EventOneResource;
use App\Http\Resources\Event\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends BaseController
{

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request): mixed
    {
        return $this->render(
            $this->renderCollectionResponse(
                $request,
                Event::query(),
                EventResource::class
            )
        );
    }

    /**
     * @param Request $request
     * @param Event $event
     * @return mixed
     */
    public function show(Request $request, Event $event): mixed
    {
        return $this->render(new EventOneResource($event));
    }
}
