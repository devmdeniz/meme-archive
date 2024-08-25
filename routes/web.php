<?php

use App\Http\Controllers\UserSecurityController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\JWTDecode;

Route::get('/', function (Request $request) {
    return view('login')->with(["request" => $request]);
})->name("loginUser");

Route::post("login", [UserSecurityController::class, 'loginUser'])->name("loginPage");

Route::get("/feed", function (Request $request) {
    return view("feed")->with([
        "request" => $request,
        "role" => JWTDecode::decodeJWTPerm($request)
    ]);
})->name("feed");

Route::get("/logout", function (Request $request) {
    $request->session()->flush();
    return redirect()->route("loginUser");
})->name("logout");