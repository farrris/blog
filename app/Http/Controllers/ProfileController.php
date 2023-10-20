<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\SubscriptionService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{   

    public function __construct(private SubscriptionService $subscriptionService)
    {
        
    }

    public function profileView(int $userId)
    {
        $user = User::findOrFail($userId);
        $profileData = [
            "user" => $user,
            "isSubscribedByMe" => $this->subscriptionService->findSubscriptionByMe($userId) ? true : false
        ];
        return view("profile.index", $profileData);
    }
}
