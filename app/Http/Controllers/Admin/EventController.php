<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventStoreRequest;
use App\Models\Category;
use App\Models\Event;

use App\Models\Speaker;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index()
    {
        $event=Event::orderBy('created_at','desc')->get();
        return view('Admin.Event.index',[
            'events'=>$event
        ]);
    }


    public function create()
    {
        $speakers=Speaker::orderBy('created_at','DESC')->get();
        $categories=Category::orderBy('created_at','DESC')->get();
        return view('Admin.Event.create',[
            'categories'=>$categories,
            'speakers'=>$speakers,
        ]);
    }

    /**
     * @param EventStoreRequest $request
     * @return mixed
     */
    public function store(EventStoreRequest $request): mixed
    {
        $validated = $request->validated();

//        $validated['slug'] = Str::slug($validated['name']);


        $new_event_img = "/event_img/" . time() . Str::random(25) . '.' . $request->file('cover_img')->getClientOriginalExtension();
        $path = public_path('/event_img/');
        $request->file('cover_img')->move($path, $new_event_img);
        //$new_event->cover_img=$new_event_img;


        /** @var Event $event */
        $event = Event::create($request->validated());

        $event->speakers()->sync($request->speakers ?? []);

        return redirect()->back()->withSuccess("Nice Job! You're event has been successfully created :) !");
    }


    public function show(Event $event)
    {
        //
    }


    public function edit(Event $event)
    {
        $categories=Category::orderBy('created_at','DESC')->get();
        $speakers=Speaker::orderBy('created_at','DESC')->get();

        return view('Admin.Event.edit',[
            'categories'=>$categories,
            'speakers'=>$speakers,
            'events'=>$event
        ]);
    }


    public function update(Request $request, Event $event)
    {
        //
    }


    public function destroy(Event $event)
    {
        //
    }

}
