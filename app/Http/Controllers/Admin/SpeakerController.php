<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Speaker\SpeakerStoreRequest;
use App\Http\Requests\Speaker\SpeakerUpdateRequest;
use App\Models\speaker;
use App\Models\user;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class SpeakerController extends Controller
{

    public function index()
    {
        $speaker = speaker::orderBy('id', 'asc')->paginate(9);
        return view('admin.speaker.index', [
            'speakers' => $speaker
        ]);
    }

    public function search(Request $request):View
    {
        $search = $request->input('search','NULL');

        $speakers = speaker::query()
            ->where('full_name', 'LIKE', "%{$search}%")
            ->orWhere('company', 'LIKE', "%{$search}%")
            ->orWhere('profession', 'LIKE', "%{$search}%")
            ->paginate(9);
        return view('admin.speaker.index')->with(array('speakers'=>$speakers));
    }

    public function create()
    {

        return view('admin.speaker.create');
    }

    /**
     * @param SpeakerStoreRequest $request
     * @return mixed
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function store(SpeakerStoreRequest $request): mixed
    {
            $speaker = speaker::create($request->validated());
            $speaker->addMedia($request->file('avatar'))->toMediaCollection('speaker_avatar');
            $speaker->addMedia($request->file('company_logo'))->toMediaCollection('company_logo');
        return redirect()->route('speaker.index')->withSuccess("Nice Job! You're speaker has been successfully created :) !");
    }


    public function show(speaker $speaker)
    {
        //
    }

    public function edit(speaker $speaker)
    {
        return view('admin.speaker.edit', [
            'speakers' => $speaker
        ]);
    }


    /**
     * @param SpeakerUpdateRequest $request
     * @param speaker $speaker
     * @return mixed
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function update(SpeakerUpdateRequest $request, speaker $speaker)
    {
        $speaker->update($request->validated());

        if ($request->hasFile('avatar')) {
            $speaker->addMedia($request->file('avatar'))->toMediaCollection('speaker_avatar');
        } elseif ($request->hasFile('company_logo')) {
            $speaker->addMedia($request->file('company_logo'))->toMediaCollection('company_logo');
        }

        return redirect()->route('speaker.index')->withSuccess("Nice Job! You're speaker has been successfully updated :) !");

    }


    public function destroy(speaker $speaker)
    {
        $speaker->events()->detach();
        $speaker->delete();
        return redirect()->back()->withSuccess("You're speaker has been successfully deleted !");
    }
}
