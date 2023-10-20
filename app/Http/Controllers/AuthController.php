<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
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

        $user = User::where("login", $credentials["login"])->first();

        if ($user && Auth::attempt(["email" => $user, "password" => $credentials["password"]])) {
            $request->session()->regenerate();
 
            return redirect()->to('/');
        } else {
            return redirect()->to("/")->withErrors(["wrong_data" => "Неправильный логин или пароль"]);
        }
    }

    public function registration(RegistrationRequest $request): RedirectResponse
    {   
        $user = $this->userService->createUser($request->validated(), $request->file("avatar"));

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
