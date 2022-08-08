<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Type\TypeStoreRequest;
use App\Http\Requests\Type\TypeUpdateRequest;
use App\Models\type;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TypeController extends Controller
{

    public function index()
    {
        $types=type::orderBy('id','asc')->paginate(15);
        return view('admin.type.index',[
            'types'=>$types
        ]);
    }
    public function search(Request $request):View
    {
        $search = $request->input('search','NULL');

        $types = type::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->paginate(15);
        return view('admin.type.index')->with(array('types'=>$types));
    }

    public function create()
    {
        return view('admin.type.create');
    }


    public function store(TypeStoreRequest $request)
    {
        $type = type::create($request->validated());

        return redirect()->route('type.index')->withSuccess("Nice Job! You're ticket's 1st type  has been successfully created :) !");
    }


    public function show(type $type)
    {
        //
    }

    public function edit(type $type)
    {
        return view('admin.type.edit',[
            'types'=>$type
        ]);
    }



    public function update(TypeUpdateRequest $request, type $type)
    {
        $type->update($request->validated());
        return redirect()->route('type.index')->withSuccess("Nice Job! You're ticket's 1st type  has been successfully updated :) !");
    }


    public function destroy(type $type)
    {
        $type->delete();
        return redirect()->back()->withSuccess(" You're ticket's 1st type has been successfully deleted !");
    }
}
