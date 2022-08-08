<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OtherType\OtherTypeStoreRequest;
use App\Http\Requests\OtherType\OtherTypeUpdateRequest;
use App\Models\otherType;
use App\Models\type;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class OtherTypeController extends Controller
{

    public function index()
    {
        $other_types=otherType::orderBy('id','asc')->paginate(15);
        return view('admin.othertype.index',[
            'other_types'=>$other_types
        ]);
    }
    public function search(Request $request):View
    {
        $search = $request->input('search','NULL');

        $other_types = otherType::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->paginate(15);
        return view('admin.othertype.index')->with(array('other_types'=>$other_types));
    }

    public function create()
    {
        return view('admin.othertype.create');
    }


    public function store(OtherTypeStoreRequest $request)
    {
        $otherType = otherType::create($request->validated());

        return redirect()->route('other_type.index')->withSuccess("Nice Job! You're ticket's 2nd type  has been successfully created :) !");
    }


    public function show(otherType $otherType)
    {
        //
    }


    public function edit(otherType $otherType)
    {
        return view('admin.othertype.edit',[
            'other_types'=>$otherType
        ]);
    }


    public function update(OtherTypeUpdateRequest $request, otherType $otherType)
    {
        $otherType->update($request->validated());
        return redirect()->route('other_type.index')->withSuccess("Nice Job! You're ticket's 2nd type   has been successfully updated :) !");
    }


    public function destroy(otherType $otherType)
    {
        $otherType->delete();
        return redirect()->back()->withSuccess(" You're ticket's 2nd type has been successfully deleted !");
    }
}
