<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use App\Http\Controllers\UserSecurityController;

class JWTDecode extends Controller
{
    public static function decodeJWT(Request $request) {
        $JWT_TOKEN = env("JWT_TOKEN");
        $jwt = $request->session()->get("jwt");
        return JWT::decode($jwt,new Key($JWT_TOKEN,"HS256"));
    }
    // Returns users current permission level
    public static function decodeJWTPerm(Request $request)
    {
        $decoded = self::decodeJWT($request);
        return $decoded->role;
    }
    public static function decodeJWTforUserId(Request $request){
        $decoded = self::decodeJWT($request);
        $username = $decoded->username;
        $usernameToId = UserSecurityController::usernameToId($username);
        return $usernameToId;
    }
}
