<?php

namespace App\Http\Controllers;

use App\Services\SubscriptionService;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{   

    public function __construct(private SubscriptionService $subscriptionService)
    {
        
    }

    public function subscribe(int $userId)
    {   
        $this->subscriptionService->createSubscription($userId);
        return redirect()->back();
    }

    public function unsubscribe(int $userId)
    {
        $this->subscriptionService->removeSubscription($userId);
        return redirect()->back();
    }
}
