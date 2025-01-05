<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return response()->json(["succsess"],200);
        }
        return response()->json(['error'],500);
    }

    public function register(Request $request)
    {
        try {
            User::create($request->all());
            $store = Store::register($request->all())->address()->create($request->get('address'));
            return response()->json([$store],200);
        } catch (\Throwable $th) { return response()->json(['error'],500); }
        return response()->json(["success"],200);
    }
}
