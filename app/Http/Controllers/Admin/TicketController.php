<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ticket\TicketStoreRequest;
use App\Http\Requests\Ticket\TicketUpdateRequest;
use App\Models\Event;
use App\Models\Item;
use App\Models\OtherType;
use App\Models\Ticket;
use App\Models\Type;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    public function index(Request $request): View
    {
        return view('Admin.Ticket.index', [
            'events' => Event::orderBy('id', 'asc')->get(),
            'types' => Type::orderBy('id', 'asc')->get(),
            'other_types' => OtherType::orderBy('id', 'asc')->get(),
            'tickets' => Ticket::orderBy('id', 'asc')->paginate(6),
        ]);
    }

    public function search(Request $request):View
    {
        $search = $request->input('search', null);
        return view('Admin.Ticket.index', [
            'events' => Event::orderBy('id', 'asc')->get(),
            'types' => Type::orderBy('id', 'asc')->get(),
            'other_types' => OtherType::orderBy('id', 'asc')->get(),
            'tickets' => Ticket::query()
                ->when($search, fn($query) => $query->whereHas('event', fn($builder) => $builder->where('title', 'LIKE', "%{$search}%")))
                ->orderBy('tickets.id', 'asc')->paginate(6),
        ]);
    }

    public function create()
    {
        return view('Admin.Ticket.create', [
            'events' => Event::orderBy('id', 'asc')->get(),
            'items' => Item::orderBy('id', 'asc')->get(),
            'types' => Type::orderBy('id', 'asc')->get(),
            'other_types' => OtherType::orderBy('id', 'asc')->get(),
        ]);
    }

    /**
     * @param TicketStoreRequest $request
     * @return mixed
     */
    public function store(TicketStoreRequest $request): mixed
    {
        /** @var Ticket $ticket */

        $ticket = Ticket::create($request->validated());
        $ticket->items()->sync($request->items ?? []);

        return redirect()->route('ticket.index')->withSuccess("Nice Job! You're ticket has been successfully created :) !");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket): View
    {
        return view('Admin.Ticket.edit', [
            'events' => Event::orderBy('id', 'asc')->get(),
            'items' => Item::orderBy('id', 'asc')->get(),
            'items_selected' => $ticket->items()->pluck('item_id')->toArray(),
            'types' => Type::orderBy('id', 'asc')->get(),
            'other_types' => OtherType::orderBy('id', 'asc')->get(),
            'ticket' => $ticket,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(TicketUpdateRequest $request, Ticket $ticket)
    {
        $ticket->update($request->validated());
        $ticket->items()->sync($request->items ?? []);
        return redirect()->route('ticket.index')->withSuccess("Nice Job! You're ticket has been successfully updated :) !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('ticket.index')->withSuccess(" You're ticket has been successfully deleted !");
    }
}
