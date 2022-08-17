<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\brochure;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BrochureRequestController extends Controller
{
    public function index():View
    {
        $brochure=brochure::orderBy('created_at','asc')->paginate(15);

        return view('admin.brochure.index',[
            'brochures'=>$brochure
        ]);
    }
    public function search(Request $request):View
    {
        $search = $request->input('search','NULL');

        $brochure = brochure::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->paginate(15);
        return view('admin.brochure.index')->with(array('brochures'=>$brochure));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\brochure  $brochure
     * @return \Illuminate\Http\Response
     */
    public function show(brochure $brochure):mixed
    {
        return view('admin.brochure.show', [
            'brochure' => $brochure
        ]);
    }

}
