<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{   

    public function __construct(private UserService $userService)
    {
        
    }

    public function loginView(): View
    {
        return view("auth.login");
    }

    public function registrationView(): View
    {
        return view("auth.registration");
    }

    public function login(LoginRequest $request): RedirectResponse
    {   

        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->to('/');
        } else {
            return redirect()->to("/login")->withErrors(["wrong_data" => "Неправильный email или пароль"]);
        }
    }

    public function registration(RegistrationRequest $request): RedirectResponse
    {
        $user = $this->userService->createUser($request->validated());

        if ($user) {
            return redirect()->to("/login");
        }
        
        return redirect()->to("/registration");
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect()->to("/");
    }
}
