<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\sponsorship;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SponsorshipRequestController extends Controller
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
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sponsorship  $sponsorship
     * @return \Illuminate\Http\Response
     */
    public function show(sponsorship $sponsorship):mixed
    {
        return view('admin.sponsorship.show', [
            'sponsorship' => $sponsorship
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sponsorship  $sponsorship
     * @return \Illuminate\Http\Response
     */
    public function edit(sponsorship $sponsorship)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sponsorship  $sponsorship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sponsorship $sponsorship)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sponsorship  $sponsorship
     * @return \Illuminate\Http\Response
     */
    public function destroy(sponsorship $sponsorship)
    {
        //
    }
}
