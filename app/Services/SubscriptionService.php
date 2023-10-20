<?php

namespace App\Services;

use App\Mail\NewSubscriptionMail;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SubscriptionService {
    public function createSubscription($userId)
    {   

        $user = User::find($userId);

        $subscription = Subscription::create([
            "user_id" => $userId,
            "subscriber_id" => Auth::id(),
        ]);

        Mail::to($user->email)->send(new NewSubscriptionMail($user));

        return $subscription;
    }

    public function removeSubscription($userId)
    {
        $subscription = $this->findSubscriptionByMe($userId);  
        return $subscription->delete();
    }

    public function findSubscriptionByMe($userId)
    {   
        $subscription = Subscription::where([
                            ["user_id", $userId],
                            ["subscriber_id", Auth::id()]
                        ])->first();

        return $subscription;
    }
}