<?php

namespace App\Services;

use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;

class SubscriptionService {
    public function createSubscription($userId)
    {
        $subscription = Subscription::create([
            "user_id" => $userId,
            "subscriber_id" => Auth::id(),
        ]);
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