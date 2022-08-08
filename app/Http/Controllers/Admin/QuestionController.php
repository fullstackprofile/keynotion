<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\question;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuestionController extends Controller
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
}
