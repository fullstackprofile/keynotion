<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\{Event\EventStoreRequest, Event\EventUpdateRequest};
use App\Models\{Attender, Category, City, Country, Event, Partner, Place, Speaker, Sponsor, State};
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(): View
    {
        return view('Admin.Event.index', [
            'events' => Event::orderBy('id', 'asc')->paginate(12)
        ]);
    }

    public function search(Request $request):View
    {
        $search = $request->input('search','NULL');

        $events = Event::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->paginate(12);
        return view('Admin.Event.index')->with(array('events'=>$events));
    }

    public function create(): View
    {
        return view('Admin.Event.create', [
            'categories' => Category::orderBy('id', 'asc')->get(),
            'speakers' => Speaker::orderBy('id', 'asc')->get(),
            'attenders' => Attender::orderBy('id', 'asc')->get(),
            'sponsors' => Sponsor::orderBy('id', 'asc')->get(),
            'partners' => Partner::orderBy('id', 'asc')->get(),
            'places' => Place::orderBy('id', 'asc')->get(),
            'countries' => Country::all(),
        ]);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getStates(Request $request): mixed
    {
        return State::where('country_id', $request->country_id)->get(["name", "id"]);
    }

    /**
     * return cities list
     *
     * @param Request $request
     * @return mixed
     */
    public function getCities(Request $request): mixed
    {
        return City::where('state_id', $request->state_id)->get(["name", "id"]);
    }

    /**
     * @param EventStoreRequest $request
     * @return mixed
     */
    public function store(EventStoreRequest $request): mixed
    {
        /** @var Event $event */

        $event = Event::create($request->validated());
        $event->addMedia($request->file('cover_img'))->toMediaCollection('event_img');
        $event->addMedia($request->file('about_img'))->toMediaCollection('event_about_img');

        $event->speakers()->sync($request->speakers ?? []);
        $event->attenders()->sync($request->attenders ?? []);
        $event->sponsors()->sync($request->sponsors ?? []);
        $event->partners()->sync($request->partners ?? []);
        $event->places()->sync($request->places ?? []);

        return redirect()->route('event.index')->withSuccess("Nice Job! You're event has been successfully created :) !");
    }

    /**
     * @param Event $event
     * @return View
     */

    public function edit(Event $event): View
    {
        $event->load('speakers');

        return view('Admin.Event.edit', [
            'categories' => Category::orderBy('id', 'asc')->get(),
            'speakers' => Speaker::orderBy('id', 'asc')->get(),
            'speakers_selected' => $event->speakers->pluck('id')->toArray(),
            'attenders' => Attender::orderBy('id', 'asc')->get(),
            'attenders_selected' => $event->attenders->pluck('id')->toArray(),
            'sponsors' => Sponsor::orderBy('id', 'asc')->get(),
            'sponsors_selected' => $event->sponsors->pluck('id')->toArray(),
            'partners' => Partner::orderBy('id', 'asc')->get(),
            'partners_selected' => $event->partners->pluck('id')->toArray(),
            'places' => Place::orderBy('id', 'asc')->get(),
            'places_selected' => $event->places->pluck('id')->toArray(),
            'countries' => Country::all(),
            'states' => State::all(),
            'state_selected'=>$event['state'],
            'cities' => City::all(),
            'city_selected'=>$event['city'],
            'event' => $event,
        ]);
    }

    /**
     * @param EventUpdateRequest $request
     * @param Event $event
     * @return mixed
     */

    public function update(EventUpdateRequest $request, Event $event)
    {
        $event->update($request->validated());

        if ($request->hasFile('cover_img')) {
            $event->addMedia($request->file('cover_img'))->toMediaCollection('event_img');
        } elseif ($request->hasFile('about_img')) {
            $event->addMedia($request->file('about_img'))->toMediaCollection('event_about_img');
        }

        $event->attenders()->sync($request->attenders ?? []);
        $event->sponsors()->sync($request->sponsors ?? []);
        $event->partners()->sync($request->partners ?? []);
        $event->places()->sync($request->places ?? []);
        $event->speakers()->sync($request->speakers ?? []);

        return redirect()->route('event.index')->withSuccess("Nice Job! You're event has been successfully updated :) !");
    }

    /**
     * @param Event $event
     * @return void
     */
    public function destroy(Event $event)
    {
        $event->speakers()->detach();
        $event->delete();
    }
}
