<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\question;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuestionsController extends Controller
{
    public function index():View
    {
        $question=question::orderBy('created_at','asc')->paginate(15);

        return view('admin.question.index',[
            'questions'=>$question
        ]);
    }
    public function search(Request $request):View
    {
        $search = $request->input('search','NULL');

        $question = question::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->paginate(15);
        return view('admin.question.index')->with(array('questions'=>$question));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(question $question):mixed
    {
        return view('admin.question.show', [
            'question' => $question
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(question $question)
    {
        //
    }
}
