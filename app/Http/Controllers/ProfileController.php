<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profileView(int $userId)
    {
        $user = User::findOrFail($userId);
        $profileData = [
            "user" => $user
        ];
        return view("profile.index", $profileData);
    }
}
