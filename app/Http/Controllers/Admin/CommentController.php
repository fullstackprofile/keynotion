<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function approve(Request $request){
        $commentId = $request->input('commentId');
        if($commentId){
            DB::table('comments')->where('id', $commentId)->update(['approve'=>1 ]);
        }
        return redirect()->route('comments');
    }
}
