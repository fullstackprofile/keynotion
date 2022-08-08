<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vacancy\VacancyStoreRequest;
use App\Http\Requests\Vacancy\VacancyUpdateRequest;
use App\Models\vacancy;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class VacancyController extends Controller
{

    public function index()
    {
        $vacancies=vacancy::orderBy('id','asc')->paginate(15);
        return view('admin.vacancy.index',[
            'vacancies'=>$vacancies
        ]);
    }
    public function search(Request $request):View
    {
        $search = $request->input('search','NULL');

        $vacancies = vacancy::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->paginate(15);
        return view('admin.vacancy.index')->with(array('vacancies'=>$vacancies));
    }

    public function create():View
    {
        return view('admin.vacancy.create');
    }


    public function store(VacancyStoreRequest $request)
    {
        $vacancy = vacancy::create($request->validated());

        return redirect()->route('vacancy.index')->withSuccess("Nice Job! You're vacancy 1st type  has been successfully created :) !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function show(vacancy $vacancy)
    {
        //
    }


    public function edit(vacancy $vacancy)
    {
        return view('admin.vacancy.edit',[
            'vacancy'=>$vacancy
        ]);
    }


    public function update(VacancyUpdateRequest $request, vacancy $vacancy)
    {
        $vacancy->update($request->validated());
        return redirect()->route('vacancy.index')->withSuccess("Nice Job! You're vacancy has been successfully updated :) !");
    }


    public function destroy(vacancy $vacancy)
    {
        $vacancy->delete();
        return redirect()->back()->withSuccess(" You're vacancy has been successfully deleted !");
    }
}
