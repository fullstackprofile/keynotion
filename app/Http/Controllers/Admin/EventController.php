<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\{Event\EventStoreRequest, Event\EventUpdateRequest};
use App\Models\{attender, category, city, country, event, partner, place, speaker, sponsor, state};
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(): View
    {
        return view('admin.event.index', [
            'events' => event::orderBy('id', 'asc')->paginate(12)
        ]);
    }

    public function search(Request $request):View
    {
        $search = $request->input('search','NULL');

        $events = event::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->paginate(12);
        return view('admin.event.index')->with(array('events'=>$events));
    }

    public function create(): View
    {
        return view('admin.event.create', [
            'categories' => category::orderBy('id', 'asc')->get(),
            'speakers' => speaker::orderBy('id', 'asc')->get(),
            'attenders' => attender::orderBy('id', 'asc')->get(),
            'sponsors' => sponsor::orderBy('id', 'asc')->get(),
            'partners' => partner::orderBy('id', 'asc')->get(),
            'places' => place::orderBy('id', 'asc')->get(),
            'countries' => country::all(),
        ]);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getStates(Request $request): mixed
    {
        return state::where('country_id', $request->country_id)->get(["name", "id"]);
    }

    /**
     * return cities list
     *
     * @param Request $request
     * @return mixed
     */
    public function getCities(Request $request): mixed
    {
        return city::where('state_id', $request->state_id)->get(["name", "id"]);
    }

    /**
     * @param EventStoreRequest $request
     * @return mixed
     */
    public function store(EventStoreRequest $request): mixed
    {

        /** @var event $event */

        $event = event::create($request->validated());
        $event->addMedia($request->file('cover_img'))->toMediaCollection('event_img');
        $event->addMedia($request->file('about_img'))->toMediaCollection('event_about_img');
        $event->addMedia($request->file('vip_tour_img'))->toMediaCollection('event_vip_tour_img');
        $event->addMedia($request->file('key_topic_img'))->toMediaCollection('event_key_topics_img');

        $event->speakers()->sync($request->speakers ?? []);
        $event->attenders()->sync($request->attenders ?? []);
        $event->sponsors()->sync($request->sponsors ?? []);
        $event->partners()->sync($request->partners ?? []);
        $event->places()->sync($request->places ?? []);

        return redirect()->route('event.index')->withSuccess("Nice Job! You're event has been successfully created :) !");
    }

    /**
     * @param event $event
     * @return View
     */

    public function edit(event $event): View
    {
        $event->load('speakers');

        return view('admin.event.edit', [
            'categories' => category::orderBy('id', 'asc')->get(),
            'speakers' => speaker::orderBy('id', 'asc')->get(),
            'speakers_selected' => $event->speakers->pluck('id')->toArray(),
            'attenders' => attender::orderBy('id', 'asc')->get(),
            'attenders_selected' => $event->attenders->pluck('id')->toArray(),
            'sponsors' => sponsor::orderBy('id', 'asc')->get(),
            'sponsors_selected' => $event->sponsors->pluck('id')->toArray(),
            'partners' => partner::orderBy('id', 'asc')->get(),
            'partners_selected' => $event->partners->pluck('id')->toArray(),
            'places' => place::orderBy('id', 'asc')->get(),
            'places_selected' => $event->places->pluck('id')->toArray(),
            'countries' => country::all(),
            'states' => state::all(),
            'state_selected'=>$event['state'],
            'cities' => city::all(),
            'city_selected'=>$event['city'],
            'event' => $event,
        ]);
    }

    /**
     * @param EventUpdateRequest $request
     * @param event $event
     * @return mixed
     */

    public function update(EventUpdateRequest $request, event $event)
    {
        $event->update($request->validated());

        if ($request->hasFile('cover_img')) {
            $event->addMedia($request->file('cover_img'))->toMediaCollection('event_img');
        } elseif ($request->hasFile('about_img')) {
            $event->addMedia($request->file('about_img'))->toMediaCollection('event_about_img');
        }elseif ($request->hasFile('vip_tour_img')){
            $event->addMedia($request->file('vip_tour_img'))->toMediaCollection('event_vip_tour_img');
        }elseif($request->hasFile('key_topic_img')){
            $event->addMedia($request->file('key_topic_img'))->toMediaCollection('event_key_topics_img');
        }

        $event->attenders()->sync($request->attenders ?? []);
        $event->sponsors()->sync($request->sponsors ?? []);
        $event->partners()->sync($request->partners ?? []);
        $event->places()->sync($request->places ?? []);
        $event->speakers()->sync($request->speakers ?? []);

        return redirect()->route('event.index')->withSuccess("Nice Job! You're event has been successfully updated :) !");
    }

    /**
     * @param event $event
     * @return void
     */
    public function destroy(event $event)
    {
        $event->speakers()->detach();
        $event->delete();
        return redirect()->route('event.index')->withSuccess("");
    }
}
