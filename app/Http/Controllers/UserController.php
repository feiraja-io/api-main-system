<?php

namespace App\Http\Controllers;

use App\Service\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function login(Request $request)
    {
        try {
            $credentials = $request->only('email', 'password');
            UserService::login($credentials);
            return response()->json(["success"],200);
        } catch (\Throwable $th) { return response()->json(['error'],500); }
    }

    public function registerStore(Request $request)
    {
        try {
            $data = $request->all();
            $store = UserService::registerStore($data);
            return response()->json([$store],200);
        } catch (\Throwable $th) { return response()->json(['error'],500); }
    }
}
