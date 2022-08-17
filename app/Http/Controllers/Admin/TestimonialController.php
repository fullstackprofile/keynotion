<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Testimonial\TestimonialStoreRequest;
use App\Http\Requests\Testimonial\TestimonialUpdateRequest;
use App\Models\testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $testimonial = testimonial::orderBy('id', 'asc')->paginate(9);
        return view('admin.testimonial.index', [
            'testimonials' => $testimonial
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestimonialStoreRequest $request): mixed
    {
        $testimonial = testimonial::create($request->validated());
        $testimonial->addMedia($request->file('logo'))->toMediaCollection('testimonial_logo');
        return redirect()->route('testimonial.index')->withSuccess("Nice Job! You're testimonial has been successfully created :) !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\testimonial  $testimonial
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(testimonial $testimonial): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.testimonial.edit', [
            'testimonials' => $testimonial
        ]);
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    /**
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     */
    public function update(TestimonialUpdateRequest $request, testimonial $testimonial)
    {
        $testimonial->update($request->validated());

        if ($request->hasFile('logo')) {
            $testimonial->addMedia($request->file('logo'))->toMediaCollection('testimonial_logo');
        }

        return redirect()->route('testimonial.index')->withSuccess("Nice Job! You're speaker has been successfully updated :) !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->back()->withSuccess("You're testimonial has been successfully deleted !");
    }
}
