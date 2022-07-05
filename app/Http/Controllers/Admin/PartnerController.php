<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Partner\PartnerStoreRequest;
use App\Http\Requests\Partner\PartnerUpdateRequest;
use App\Models\Partner;
use App\Models\Sponsor;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PartnerController extends Controller
{

    public function index()
    {
        $partner=Partner::orderBy('id','asc')->paginate(12);
        return view('Admin.Partner.index',[
            'partners'=>$partner
        ]);
    }

    public function search(Request $request):View
    {
        $search = $request->input('search','NULL');

        $partners = Partner::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->paginate(12);
        return view('Admin.Partner.index')->with(array('partners'=>$partners));
    }


    public function create()
    {
       return view('Admin.Partner.create');
    }


    /**
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     */
    public function store(PartnerStoreRequest $request)
    {
        $partner = Partner::create($request->validated());
        $partner->addMedia($request->file('logo'))->toMediaCollection('partner_logo');
        return redirect()->route('partner.index')->withSuccess("Nice Job! You're partner has been successfully created :) !");
    }

    public function show(Partner $partner)
    {
        //
    }


    public function edit(Partner $partner)
    {
        return view('Admin.Partner.edit',[
            'partners'=>$partner
        ]);
    }


    /**
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     */
    public function update(PartnerUpdateRequest $request, Partner $partner)
    {
        $partner->update($request->validated());

        if ($request->hasFile('logo')) {
            $partner->addMedia($request->file('logo'))->toMediaCollection('partner_logo');
        }
        return redirect()->route('partner.index')->withSuccess("Nice Job! You're partner has been successfully updated :) !");
    }


    public function destroy(Partner $partner)
    {
        $partner->events()->detach();
        $partner->delete();
        return redirect()->back()->withSuccess("You're partner has been successfully deleted !");
    }
}
