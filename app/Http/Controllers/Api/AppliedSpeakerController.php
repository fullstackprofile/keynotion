<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Api\ApplySpeaker\ApplySpeakerStoreRequest;
use App\Models\appliedSpeaker;
use App\Models\User;
use App\Notifications\ApplySpeakerNotification;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Notification;

class AppliedSpeakerController extends BaseController
{
    /**
     * @param ApplySpeakerStoreRequest $request
     * @return Response
     */
    public function storeApplySpeaker(ApplySpeakerStoreRequest $request):Response
    {
        $apply_speaker = AppliedSpeaker::create($request->validated());
        $admin = User::where('role', 'admin')->get();
        Notification::send($admin, new ApplySpeakerNotification($apply_speaker));
        return response($apply_speaker, 201);
    }
}
