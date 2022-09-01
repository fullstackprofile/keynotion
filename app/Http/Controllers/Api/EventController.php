<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\Event\EventOneResource;
use App\Http\Resources\Event\EventResource;
use App\Models\event;
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
                event::query(),
                EventResource::class
            )
        );
    }

    /**
     * @param Request $request
     * @param event $event
     * @return mixed
     */
    public function show(Request $request, event $event): mixed
    {
        return $this->render(new EventOneResource($event));
    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function showPast(Request $request): mixed
    {
        return $this->render(
            EventResource::collection(event::query()
                ->whereDate('end_date', '<', date('d F Y'))
                ->get()
            )
        );
    }

}
