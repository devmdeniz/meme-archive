<?php

namespace App\Http\Controllers;

use App\Models\UserSecurity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Firebase\JWT\JWT;

class UserSecurityController extends Controller
{
    // Login User Form
    public function LoginUser(Request $request)
    {
        $stage = $request->input('stage');

        //? Stage 1
        if ($stage == "stage1") {
            $username = $request->input('username');
            $result = $this->stageOneLogin($username);

            if ($result) {
                $request->session()->put("username", $username);
                $request->session()->put("stage", "stage2");
                return redirect()->route("loginUser");
            }

            return redirect()->route("loginUser")->withErrors(["error" => "Invalid Username"]);
            //? Stage 2
        } else {
            $password = $request->input('password');
            $result = $this->StageTwoLogin($password, $request);

            if ($result) {
                $username = $request->session()->get("username");
                $role = DB::table("users")->where("username", $username)->first()->role;

                $this->encryptJWT($username, $role);

                $request->session()->forget("username");
                $request->session()->forget("stage");

                //? If Successful then redirect to:
                return redirect()->route("feed");
            }
            return redirect()->route("loginUser")->withErrors(["error" => "Invalid Password"]);
        }
    }

    // Stage One - Username Input
    private function stageOneLogin($username)
    {
        $user = DB::table("users")->where("username", $username)->first();

        if ($user) {
            return true;
        }

        return false;
    }

    // Stage Two - Password Input
    private function stageTwoLogin($password, Request $request)
    {
        $username = $request->session()->get("username");
        $user = DB::table("users")->where("username", $username)->first();

        if ($user) {
            if (hash("sha256", $password) == $user->password) {
                return true;
            }
        }

        return false;
    }

    private function encryptJWT($username, $role)
    {
        $jwtKey = env("JWT_TOKEN");

        $payload = array(
            "username" => $username,
            "role" => $role
        );

        $jwt = JWT::encode($payload, $jwtKey, 'HS256');
        session()->put("jwt", $jwt);
    }
}
