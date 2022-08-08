<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\sponsorship;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SponsorshipController extends Controller
{
    public function index():View
    {
        $sponsorship=sponsorship::orderBy('created_at','asc')->paginate(15);

        return view('admin.sponsorship.index',[
            'sponsorships'=>$sponsorship
        ]);
    }
    public function search(Request $request):View
    {
        $search = $request->input('search','NULL');

        $sponsorship = sponsorship::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->paginate(15);
        return view('admin.sponsorship.index')->with(array('sponsorships'=>$sponsorship));
    }
}
