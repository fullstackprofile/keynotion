<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\appliedSpeaker;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AppliedSpeakerController extends Controller
{
    public function index():View
    {
        $applied_speaker=appliedSpeaker::orderBy('created_at','asc')->paginate(15);

        return view('admin.appliedspeakers.index',[
            'applied_speakers'=>$applied_speaker
        ]);
    }
    public function search(Request $request):View
    {
        $search = $request->input('search','NULL');

        $applied_speaker = appliedSpeaker::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->paginate(15);
        return view('admin.appliedspeakers.index')->with(array('applied_speakers'=>$applied_speaker));
    }
}
