<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Place\PlaceStoreRequest;
use App\Http\Requests\Place\PlaceUpdateRequest;
use App\Models\partner;
use App\Models\place;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PlaceController extends Controller
{

    /**
     * @return View
     */
    public function index(): View
    {
        $place=place::orderBy('id','asc')->paginate(12);
        return view('admin.place.index',[
            'places'=>$place
        ]);
    }

    public function search(Request $request):View
    {
        $search = $request->input('search','NULL');

        $places = place::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->paginate(12);
        return view('admin.place.index')->with(array('places'=>$places));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.place.create');
    }


    /**
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     */
    public function store(PlaceStoreRequest $request)
    {
        $place = place::create($request->validated());
        $place->addMedia($request->file('cover'))->toMediaCollection('place_cover');
        $place->addMedia($request->file('logo'))->toMediaCollection('place_logo');

        return redirect()->route('place.index')->withSuccess("Nice Job! You're Venue has been successfully created :) !");
    }


    public function show(place $place)
    {
        //
    }


    /**
     * @param place $place
     * @return View
     */
    public function edit(place $place): View
    {
        return view('admin.place.edit',[
            'places'=>$place
        ]);
    }


    /**
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     */
    public function update(PlaceUpdateRequest $request, place $place)
    {
        $place->update($request->validated());
        if ($request->hasFile('cover')) {
            $place->addMedia($request->file('cover'))->toMediaCollection('place_cover');
        }
        elseif($request->hasFile('logo')){
            $place->addMedia($request->file('logo'))->toMediaCollection('place_logo');
        }
        return redirect()->route('place.index')->withSuccess("Nice Job! You're venue has been successfully updated :) !");
    }


    public function destroy(place $place)
    {
        $place->events()->detach();
        $place->delete();
        return redirect()->back()->withSuccess(" You're Venue has been successfully deleted !");
    }
}
