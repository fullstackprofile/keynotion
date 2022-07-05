<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Type\TypeStoreRequest;
use App\Http\Requests\Type\TypeUpdateRequest;
use App\Models\Type;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TypeController extends Controller
{

    public function index()
    {
        $types=Type::orderBy('id','asc')->paginate(15);
        return view('Admin.Type.index',[
            'types'=>$types
        ]);
    }
    public function search(Request $request):View
    {
        $search = $request->input('search','NULL');

        $types = Type::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->paginate(15);
        return view('Admin.Type.index')->with(array('types'=>$types));
    }

    public function create()
    {
        return view('Admin.Type.create');
    }


    public function store(TypeStoreRequest $request)
    {
        $type = Type::create($request->validated());

        return redirect()->route('type.index')->withSuccess("Nice Job! You're ticket's 1st type  has been successfully created :) !");
    }


    public function show(Type $type)
    {
        //
    }

    public function edit(Type $type)
    {
        return view('Admin.Type.edit',[
            'types'=>$type
        ]);
    }



    public function update(TypeUpdateRequest $request, Type $type)
    {
        $type->update($request->validated());
        return redirect()->route('type.index')->withSuccess("Nice Job! You're ticket's 1st type  has been successfully updated :) !");
    }


    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->back()->withSuccess(" You're ticket's 1st type has been successfully deleted !");
    }
}
