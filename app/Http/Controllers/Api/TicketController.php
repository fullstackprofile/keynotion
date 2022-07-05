<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\Ticket\TicketResource;
use App\Models\Ticket;
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
                Ticket::query(),
                TicketResource::class
            )
        );
    }



}
