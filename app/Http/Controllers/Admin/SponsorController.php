<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sponsor\SponsorStoreRequest;
use App\Http\Requests\Sponsor\SponsorUpdateRequest;
use App\Http\Requests\UpdateSponsorRequest;
use App\Models\attender;
use App\Models\sponsor;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SponsorController extends Controller
{

    public function index()
    {
        $sponsor=sponsor::orderBy('id','asc')->paginate(12);
        return view('admin.sponsor.index',[
            'sponsors'=>$sponsor
        ]);
    }
    public function search(Request $request):View
    {
        $search = $request->input('search','NULL');

        $sponsors = sponsor::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->paginate(12);
        return view('admin.sponsor.index')->with(array('sponsors'=>$sponsors));
    }

    public function create()
    {
        return view('admin.sponsor.create');
    }


    /**
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     */
    public function store(SponsorStoreRequest $request): mixed
    {
        $sponsor = sponsor::create($request->validated());
        $sponsor->addMedia($request->file('logo'))->toMediaCollection('sponsor_logo');
        return redirect()->route('sponsor.index')->withSuccess("Nice Job! You're sponsor has been successfully created :) !");
    }


    public function show(sponsor $sponsor)
    {
        //
    }


    public function edit(sponsor $sponsor)
    {
        return view('admin.sponsor.edit',[
            'sponsors'=>$sponsor
        ]);
    }


    /**
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     */
    public function update(SponsorUpdateRequest $request, sponsor $sponsor)
    {
        $sponsor->update($request->validated());
        if ($request->hasFile('logo')) {
            $sponsor->addMedia($request->file('logo'))->toMediaCollection('sponsor_logo');
        }
        return redirect()->route('sponsor.index')->withSuccess("Nice Job! You're sponsor has been successfully updated :) !");
    }


    public function destroy(sponsor $sponsor)
    {
        $sponsor->events()->detach();
        $sponsor->delete();
        return redirect()->back()->withSuccess("You're sponsor has been successfully deleted !");
    }
}
