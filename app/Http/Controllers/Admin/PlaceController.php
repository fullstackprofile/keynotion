<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Place\PlaceStoreRequest;
use App\Http\Requests\Place\PlaceUpdateRequest;
use App\Models\Partner;
use App\Models\Place;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PlaceController extends Controller
{

    public function index()
    {
        $place=Place::orderBy('id','asc')->paginate(12);
        return view('Admin.Place.index',[
            'places'=>$place
        ]);
    }

    public function search(Request $request):View
    {
        $search = $request->input('search','NULL');

        $places = Place::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->paginate(12);
        return view('Admin.Place.index')->with(array('places'=>$places));
    }

    public function create()
    {
        return view('Admin.Place.create');
    }


    /**
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     */
    public function store(PlaceStoreRequest $request)
    {
        $place = Place::create($request->validated());
        foreach ($request->file('cover') as $cover) {
            $place->addMedia($cover)->toMediaCollection('place_cover');
        }
        $place->addMedia($request->file('logo'))->toMediaCollection('place_logo');

        return redirect()->route('place.index')->withSuccess("Nice Job! You're Venue has been successfully created :) !");
    }


    public function show(Place $place)
    {
        //
    }


    public function edit(Place $place)
    {
        return view('Admin.Place.edit',[
            'places'=>$place
        ]);
    }


    public function update(PlaceUpdateRequest $request, Place $place)
    {
        $place->update([
            'title'=>$request->title,
            'address'=>$request->address,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
        ]);
        return redirect()->route('place.index')->withSuccess("Nice Job! You're venue has been successfully updated :) !");
    }


    public function destroy(Place $place)
    {
        $place->events()->detach();
        $place->delete();
        return redirect()->back()->withSuccess(" You're Venue has been successfully deleted !");
    }
}
