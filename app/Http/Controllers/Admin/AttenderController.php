<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Attender\AttenderStoreRequest;
use App\Http\Requests\Attender\AttenderUpdateRequest;
use App\Models\attender;
use App\Models\speaker;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AttenderController extends Controller
{

    public function index()
    {
        $attender=attender::orderBy('id','asc') ->paginate(12);
        return view('admin.attender.index',[
            'attenders'=>$attender
        ]);
    }
    public function search(Request $request):View
    {
        $search = $request->input('search','NULL');

        $attenders = attender::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->paginate(12);
        return view('admin.attender.index')->with(array('attenders'=>$attenders));
    }

    public function create()
    {
        return view('admin.attender.create');
    }


    public function store(AttenderStoreRequest $request): mixed
    {

        $attender = attender::create($request->validated());

        return redirect()->route('attender.index')->withSuccess("Nice Job! You're attender has been successfully created :) !");

    }


    public function show(attender $attender)
    {
        //
    }


    public function edit(attender $attender)
    {
        return view('admin.attender.edit',[
            'attenders'=>$attender
        ]);
    }


    public function update(AttenderUpdateRequest $request, attender $attender)
    {
        $attender->update([
            'title'=>$request->title,
        ]);
        return redirect()->route('attender.index')->withSuccess("Nice Job! You're attender has been successfully updated :) !");
    }


    public function destroy(attender $attender)
    {
        $attender->delete();
        return redirect()->back()->withSuccess(" You're attender has been successfully deleted !");
    }
}
