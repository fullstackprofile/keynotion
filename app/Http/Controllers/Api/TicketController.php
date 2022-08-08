<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\Ticket\TicketRelResource;
use App\Http\Resources\Ticket\TicketResource;
use App\Models\ticket;
use Illuminate\Http\Request;

class TicketController extends BaseController
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
                ticket::query()
                    ->when($request->has('Events'), fn($builder) => $builder->where('event_id', $request->Events)),
                TicketResource::class
            )
        );
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function show(Request $request): mixed
    {
        return $this->render(
            TicketRelResource::collection(ticket::query()
                ->when(
                    $request->has('exclude_event'), fn($builder) => $builder->where('event_id', '!=', $request->exclude_event)
                )
                ->take(3)
                ->get()
            )
        );
    }
}
