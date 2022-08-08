<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\eventQuestion;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EventQuestionController extends Controller
{
    public function index():View
    {
        $question=eventQuestion::orderBy('created_at','asc')->paginate(15);

        return view('admin.eventquestions.index',[
            'questions'=>$question
        ]);
    }
    public function search(Request $request):View
    {
        $search = $request->input('search','NULL');

        $question = eventQuestion::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->paginate(15);
        return view('admin.eventquestions.index')->with(array('questions'=>$question));
    }

}
