<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriptionController;
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

Route::group(["prefix" => "/profile/{userId}", "middleware" => "auth"], function() {
    Route::get("/", [ProfileController::class, "profileView"]);
    Route::get("/subscribe", [SubscriptionController::class, "subscribe"]);
    Route::get("/unsubscribe", [SubscriptionController::class, "unsubscribe"]);
});

Route::group(["prefix" => "/posts", "middleware" => "auth"], function() {
    Route::get("/create", [PostController::class, "create"]);
    Route::post("/store/image", [PostController::class, "storeImage"]);
    Route::post("/store/video", [PostController::class, "storeVideo"]);
    Route::post("/store/text", [PostController::class, "storeText"]);
    Route::post("/store/quote", [PostController::class, "storeQuote"]);
    Route::post("/store/link", [PostController::class, "storeLink"]);
});