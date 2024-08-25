<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTDecode extends Controller
{
    // Returns users current permission level
    public static function decodeJWTPerm(Request $request)
    {
        $JWT_TOKEN = env("JWT_TOKEN");
        $jwt = $request->session()->get("jwt");
        $decoded = JWT::decode($jwt,new Key($JWT_TOKEN,"HS256"));
        return $decoded->role;
    }
}
