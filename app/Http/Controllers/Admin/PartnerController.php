<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Partner\PartnerStoreRequest;
use App\Http\Requests\Partner\PartnerUpdateRequest;
use App\Models\partner;
use App\Models\sponsor;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PartnerController extends Controller
{

    public function index()
    {
        $partner=partner::orderBy('id','asc')->paginate(12);
        return view('admin.partner.index',[
            'partners'=>$partner
        ]);
    }

    public function search(Request $request):View
    {
        $search = $request->input('search','NULL');

        $partners = partner::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->paginate(12);
        return view('admin.partner.index')->with(array('partners'=>$partners));
    }


    public function create()
    {
       return view('admin.partner.create');
    }


    /**
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     */
    public function store(PartnerStoreRequest $request)
    {
        $partner = partner::create($request->validated());
        $partner->addMedia($request->file('logo'))->toMediaCollection('partner_logo');
        return redirect()->route('partner.index')->withSuccess("Nice Job! You're partner has been successfully created :) !");
    }

    public function show(partner $partner)
    {
        //
    }


    public function edit(partner $partner)
    {
        return view('admin.partner.edit',[
            'partners'=>$partner
        ]);
    }


    /**
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     */
    public function update(PartnerUpdateRequest $request, partner $partner)
    {
        $partner->update($request->validated());

        if ($request->hasFile('logo')) {
            $partner->addMedia($request->file('logo'))->toMediaCollection('partner_logo');
        }
        return redirect()->route('partner.index')->withSuccess("Nice Job! You're partner has been successfully updated :) !");
    }


    public function destroy(partner $partner)
    {
        $partner->events()->detach();
        $partner->delete();
        return redirect()->back()->withSuccess("You're partner has been successfully deleted !");
    }
}
