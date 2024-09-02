<?php

use App\Http\Controllers\UserSecurityController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\JWTDecode;
use App\Http\Controllers\PostSettings;

Route::middleware(['checkSession'])->group(function () {
/**
 * ! Feed Page or Home Page
 * */
Route::get("/feed", function (Request $request) {
    $meme = PostSettings::showMeme();
    $sessionUserId = JWTDecode::decodeJWTforUserId($request);
    return view("feed")->with([
        "request" => $request,
        "role" => JWTDecode::decodeJWTPerm($request),
        "meme" => $meme,
        "sessionid" => $sessionUserId
    ]);
})->name("feed");

Route::get("Profile/Memes", function (Request $request) {
    $myMemes = PostSettings::showMemeByUser($request);
    return view("myMemes")->with([
        "request" => $request,
        "role" => JWTDecode::decodeJWTPerm($request),
        "myMemes" => $myMemes
    ]);
})->name("myMemes");

});
/**
 * ! Logout Page
 * ! Login Page
 */
Route::get("/logout", function (Request $request) {
    $request->session()->flush();
    return redirect()->route("loginUser");
})->name("logout");

Route::get('/', function (Request $request) {
    return view('login')->with(["request" => $request]);
})->name("loginUser");

Route::post("login", [UserSecurityController::class, 'loginUser'])->name("loginPage");


/** CDE PAGES
 * ! Create Meme Pages
 * ! Delete Meme Pages
 * ! Edit Meme Pages
 */

// ! Create Meme Page
Route::get("/CreateMeme", function (Request $request) {
    $memeTypes = PostSettings::getMemeTypes();
    return view("createMeme")->with([
        "request" => $request,
        "role" => JWTDecode::decodeJWTPerm($request),
        "memeTypes" => $memeTypes
    ]);
})->name("createMeme");

//! Delete Meme
Route::get("/DeleteMeme/{id}", [PostSettings::class, 'deleteMeme'])->name("DeleteMeme");

//! Edit Meme Page
Route::get("/EditMeme/{id}",function(Request $request, $id){
    $meme = PostSettings::showMemeById($id);
    $memeTypes = PostSettings::showMemeTypeByPostId($id);
    return view("editMeme")->with([
        "request" => $request,
        "role" => JWTDecode::decodeJWTPerm($request),
        "meme" => $meme,
        "memeType" => $memeTypes
    ]);
})->name("EditMemePost");

//! Edit Meme
Route::post("/EditMeme/{id}", [PostSettings::class, 'editMeme'])->name("EditMeme");
//! Post Meme
Route::post("/PostMeme", [PostSettings::class, 'createMeme'])->name("PostMeme");

Route::get("/searchMeme", function(Request $request){
    return view("searchMeme")->with([
        "request" => $request,
        "role" => JWTDecode::decodeJWTPerm($request),
    ]);
})->name("searchMeme");

Route::post("/searchMemePost", [PostSettings::class, 'searchMeme'])->name("searchMemePost");
