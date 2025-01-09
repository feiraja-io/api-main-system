<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return response()->json(["success"],200);
        }
        return response()->json(['error'],500);
    }

    public function register(Request $request)
    {
        try {
            $data = $request->all();
            $store = User::registerStore($data,$data['address'],$data);
            return response()->json([$store],200);
        } catch (\Throwable $th) { return response()->json(['error'],500); }
    }

    public function registerImages(Request $request)
    {
        try {
            $data = $request->all();
            $store_image = File::registerStoreImages($data['id'],$data);
            return response()->json([$store_image],200);
        } catch (\Throwable $th) { return response()->json(['error'],500); }
    }

    public function registerBank(Request $request)
    {}
}
