<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", [HomeController::class, "index"]);

Route::get("/login", [AuthController::class, "loginView"]);
Route::post("/login", [AuthController::class, "login"]);

Route::get("/registration", [AuthController::class, "registrationView"]);
Route::post("/registration", [AuthController::class, "registration"]);

Route::get("/logout", [AuthController::class, "logout"]);

Route::group(["middleware" => "auth"], function() {
    Route::get("/profile/{userId}", [ProfileController::class, "profileView"]);
});