<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Sponsorship\SponsorshipStoreRequest;
use App\Models\sponsorship;
use App\Models\user;
use App\Notifications\SponsorshipRequestNotification;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Notification;

class SponsorshipRequestController extends Controller
{
    /**
     * @param SponsorshipStoreRequest $request
     * @return Response
     */
    public function storeSponsorship(SponsorshipStoreRequest $request):Response
    {
        $sponsorship = sponsorship::create($request->validated());
        /** @var User $admin */
        $admin = User::where('email','sponsorship@key-notion.com')->get()->each(function (User $user) use ($sponsorship) {
            $user->notify(new SponsorshipRequestNotification($sponsorship));
        });
        return response($sponsorship, 201);
    }
}
