<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sponsor\SponsorStoreRequest;
use App\Http\Requests\Sponsor\SponsorUpdateRequest;
use App\Http\Requests\UpdateSponsorRequest;
use App\Models\Attender;
use App\Models\Sponsor;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SponsorController extends Controller
{

    public function index()
    {
        $sponsor=Sponsor::orderBy('id','asc')->paginate(12);
        return view('Admin.Sponsor.index',[
            'sponsors'=>$sponsor
        ]);
    }
    public function search(Request $request):View
    {
        $search = $request->input('search','NULL');

        $sponsors = Sponsor::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->paginate(12);
        return view('Admin.Sponsor.index')->with(array('sponsors'=>$sponsors));
    }

    public function create()
    {
        return view('Admin.Sponsor.create');
    }


    /**
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     */
    public function store(SponsorStoreRequest $request): mixed
    {
        $sponsor = Sponsor::create($request->validated());
        $sponsor->addMedia($request->file('logo'))->toMediaCollection('sponsor_logo');
        return redirect()->route('sponsor.index')->withSuccess("Nice Job! You're sponsor has been successfully created :) !");
    }


    public function show(Sponsor $sponsor)
    {
        //
    }


    public function edit(Sponsor $sponsor)
    {
        return view('Admin.Sponsor.edit',[
            'sponsors'=>$sponsor
        ]);
    }


    /**
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     */
    public function update(SponsorUpdateRequest $request, Sponsor $sponsor)
    {
        $sponsor->update($request->validated());
        if ($request->hasFile('logo')) {
            $sponsor->addMedia($request->file('logo'))->toMediaCollection('sponsor_logo');
        }
        return redirect()->route('sponsor.index')->withSuccess("Nice Job! You're sponsor has been successfully updated :) !");
    }


    public function destroy(Sponsor $sponsor)
    {
        $sponsor->events()->detach();
        $sponsor->delete();
        return redirect()->back()->withSuccess("You're sponsor has been successfully deleted !");
    }
}
