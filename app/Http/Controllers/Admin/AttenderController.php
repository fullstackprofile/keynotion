<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Attender\AttenderStoreRequest;
use App\Http\Requests\Attender\AttenderUpdateRequest;
use App\Models\Attender;
use App\Models\Speaker;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AttenderController extends Controller
{

    public function index()
    {
        $attender=Attender::orderBy('id','asc') ->paginate(12);
        return view('Admin.Attender.index',[
            'attenders'=>$attender
        ]);
    }
    public function search(Request $request):View
    {
        $search = $request->input('search','NULL');

        $attenders = Attender::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->paginate(12);
        return view('Admin.Attender.index')->with(array('attenders'=>$attenders));
    }

    public function create()
    {
        return view('Admin.Attender.create');
    }


    public function store(AttenderStoreRequest $request): mixed
    {

        $attender = Attender::create($request->validated());

        return redirect()->route('attender.index')->withSuccess("Nice Job! You're attender has been successfully created :) !");

    }


    public function show(Attender $attender)
    {
        //
    }


    public function edit(Attender $attender)
    {
        return view('Admin.Attender.edit',[
            'attenders'=>$attender
        ]);
    }


    public function update(AttenderUpdateRequest $request, Attender $attender)
    {
        $attender->update([
            'title'=>$request->title,
        ]);
        return redirect()->route('attender.index')->withSuccess("Nice Job! You're attender has been successfully updated :) !");
    }


    public function destroy(Attender $attender)
    {
        $attender->delete();
        return redirect()->back()->withSuccess(" You're attender has been successfully deleted !");
    }
}
