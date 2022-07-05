<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vacancy\VacancyStoreRequest;
use App\Http\Requests\Vacancy\VacancyUpdateRequest;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class VacancyController extends Controller
{

    public function index()
    {
        $vacancies=Vacancy::orderBy('id','asc')->paginate(15);
        return view('Admin.Vacancy.index',[
            'vacancies'=>$vacancies
        ]);
    }
    public function search(Request $request):View
    {
        $search = $request->input('search','NULL');

        $vacancies = Vacancy::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->paginate(15);
        return view('Admin.Vacancy.index')->with(array('vacancies'=>$vacancies));
    }

    public function create():View
    {
        return view('Admin.Vacancy.create');
    }


    public function store(VacancyStoreRequest $request)
    {
        $vacancy = Vacancy::create($request->validated());

        return redirect()->route('vacancy.index')->withSuccess("Nice Job! You're Vacancy 1st type  has been successfully created :) !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function show(Vacancy $vacancy)
    {
        //
    }


    public function edit(Vacancy $vacancy)
    {
        return view('Admin.Vacancy.edit',[
            'vacancy'=>$vacancy
        ]);
    }


    public function update(VacancyUpdateRequest $request, Vacancy $vacancy)
    {
        $vacancy->update($request->validated());
        return redirect()->route('vacancy.index')->withSuccess("Nice Job! You're vacancy has been successfully updated :) !");
    }


    public function destroy(Vacancy $vacancy)
    {
        $vacancy->delete();
        return redirect()->back()->withSuccess(" You're vacancy has been successfully deleted !");
    }
}
