<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\comment;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CommentController extends Controller
{
    public function index():View
    {
        $comment=comment::orderBy('created_at','asc')->paginate(15);

        return view('admin.comments.index',[
            'comments'=>$comment
        ]);
    }
    public function search(Request $request):View
    {
        $search = $request->input('search','NULL');

        $comment = comment::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->paginate(15);
        return view('admin.comments.index')->with(array('comments'=>$comment));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(comment $comment):mixed
    {
        return view('admin.comments.show', [
            'comment' => $comment
        ]);
    }


}
