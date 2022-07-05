<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OtherType\OtherTypeStoreRequest;
use App\Http\Requests\OtherType\OtherTypeUpdateRequest;
use App\Models\OtherType;
use App\Models\Type;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class OtherTypeController extends Controller
{

    public function index()
    {
        $other_types=OtherType::orderBy('id','asc')->paginate(15);
        return view('Admin.OtherType.index',[
            'other_types'=>$other_types
        ]);
    }
    public function search(Request $request):View
    {
        $search = $request->input('search','NULL');

        $other_types = OtherType::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->paginate(15);
        return view('Admin.OtherType.index')->with(array('other_types'=>$other_types));
    }

    public function create()
    {
        return view('Admin.OtherType.create');
    }


    public function store(OtherTypeStoreRequest $request)
    {
        $otherType = OtherType::create($request->validated());

        return redirect()->route('other_type.index')->withSuccess("Nice Job! You're ticket's 2nd type  has been successfully created :) !");
    }


    public function show(OtherType $otherType)
    {
        //
    }


    public function edit(OtherType $otherType)
    {
        return view('Admin.OtherType.edit',[
            'other_types'=>$otherType
        ]);
    }


    public function update(OtherTypeUpdateRequest $request, OtherType $otherType)
    {
        $otherType->update($request->validated());
        return redirect()->route('other_type.index')->withSuccess("Nice Job! You're ticket's 2nd type   has been successfully updated :) !");
    }


    public function destroy(OtherType $otherType)
    {
        $otherType->delete();
        return redirect()->back()->withSuccess(" You're ticket's 2nd type has been successfully deleted !");
    }
}
