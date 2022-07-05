<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Speaker\SpeakerStoreRequest;
use App\Http\Requests\Speaker\SpeakerUpdateRequest;
use App\Models\Speaker;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class SpeakerController extends Controller
{

    public function index()
    {
        $speaker = Speaker::orderBy('id', 'asc')->paginate(9);
        return view('Admin.Speaker.index', [
            'speakers' => $speaker
        ]);
    }

    public function search(Request $request):View
    {
        $search = $request->input('search','NULL');

        $speakers = Speaker::query()
            ->where('full_name', 'LIKE', "%{$search}%")
            ->orWhere('company', 'LIKE', "%{$search}%")
            ->orWhere('profession', 'LIKE', "%{$search}%")
            ->paginate(9);
        return view('Admin.Speaker.index')->with(array('speakers'=>$speakers));
    }

    public function create()
    {

        return view('Admin.Speaker.create');
    }

    /**
     * @param SpeakerStoreRequest $request
     * @return mixed
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function store(SpeakerStoreRequest $request): mixed
    {
            $speaker = Speaker::create($request->validated());
            $speaker->addMedia($request->file('avatar'))->toMediaCollection('speaker_avatar');
            $speaker->addMedia($request->file('company_logo'))->toMediaCollection('company_logo');
        return redirect()->route('speaker.index')->withSuccess("Nice Job! You're speaker has been successfully created :) !");
    }


    public function show(Speaker $speaker)
    {
        //
    }

    public function edit(Speaker $speaker)
    {
        return view('Admin.Speaker.edit', [
            'speakers' => $speaker
        ]);
    }


    /**
     * @param SpeakerUpdateRequest $request
     * @param Speaker $speaker
     * @return mixed
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function update(SpeakerUpdateRequest $request, Speaker $speaker)
    {
        $speaker->update($request->validated());

        if ($request->hasFile('avatar')) {
            $speaker->addMedia($request->file('avatar'))->toMediaCollection('speaker_avatar');
        } elseif ($request->hasFile('company_logo')) {
            $speaker->addMedia($request->file('company_logo'))->toMediaCollection('company_logo');
        }

        return redirect()->route('speaker.index')->withSuccess("Nice Job! You're speaker has been successfully updated :) !");

    }


    public function destroy(Speaker $speaker)
    {
        $speaker->events()->detach();
        $speaker->delete();
        return redirect()->back()->withSuccess("You're speaker has been successfully deleted !");
    }
}
