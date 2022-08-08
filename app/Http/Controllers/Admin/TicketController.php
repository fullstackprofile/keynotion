<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ticket\TicketStoreRequest;
use App\Http\Requests\Ticket\TicketUpdateRequest;
use App\Models\event;
use App\Models\item;
use App\Models\otherType;
use App\Models\ticket;
use App\Models\type;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    public function index(Request $request): View
    {
        return view('admin.ticket.index', [
            'events' => event::orderBy('id', 'asc')->get(),
            'types' => type::orderBy('id', 'asc')->get(),
            'other_types' => otherType::orderBy('id', 'asc')->get(),
            'tickets' => ticket::orderBy('id', 'asc')->paginate(6),
        ]);
    }

    public function search(Request $request):View
    {
        $search = $request->input('search', null);
        return view('admin.ticket.index', [
            'events' => event::orderBy('id', 'asc')->get(),
            'types' => type::orderBy('id', 'asc')->get(),
            'other_types' => otherType::orderBy('id', 'asc')->get(),
            'tickets' => ticket::query()
                ->when($search, fn($query) => $query->whereHas('event', fn($builder) => $builder->where('title', 'LIKE', "%{$search}%")))
                ->orderBy('tickets.id', 'asc')->paginate(6),
        ]);
    }

    public function create()
    {
        return view('admin.ticket.create', [
            'events' => event::orderBy('id', 'asc')->get(),
            'items' => item::orderBy('id', 'asc')->get(),
            'types' => type::orderBy('id', 'asc')->get(),
            'other_types' => otherType::orderBy('id', 'asc')->get(),
        ]);
    }

    /**
     * @param TicketStoreRequest $request
     * @return mixed
     */
    public function store(TicketStoreRequest $request): mixed
    {
        /** @var ticket $ticket */

        $ticket = ticket::create($request->validated());
        $ticket->items()->sync($request->items ?? []);

        return redirect()->route('ticket.index')->withSuccess("Nice Job! You're ticket has been successfully created :) !");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(ticket $ticket): View
    {
        return view('admin.ticket.edit', [
            'events' => event::orderBy('id', 'asc')->get(),
            'items' => item::orderBy('id', 'asc')->get(),
            'items_selected' => $ticket->items()->pluck('item_id')->toArray(),
            'types' => type::orderBy('id', 'asc')->get(),
            'other_types' => otherType::orderBy('id', 'asc')->get(),
            'ticket' => $ticket,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(TicketUpdateRequest $request, ticket $ticket)
    {
        $ticket->update($request->validated());
        $ticket->items()->sync($request->items ?? []);
        return redirect()->route('ticket.index')->withSuccess("Nice Job! You're ticket has been successfully updated :) !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('ticket.index')->withSuccess(" You're ticket has been successfully deleted !");
    }
}
