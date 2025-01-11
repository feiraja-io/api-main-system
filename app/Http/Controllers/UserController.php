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

    public function registerStore(Request $request)
    {
        try {
            $data = $request->all();
            $store = User::registerStore($data);
            return response()->json([$store],200);
        } catch (\Throwable $th) { dump($th->getMessage()); return response()->json(['error'],500); }
    }

    public function registerAddresses(Request $request)
    {
        try {
            $data = $request->all();
            $user = User::findOrFail($data['id'])
            ->address()->create($data);
            $user->update(['cities_delivery' => $data['cities_delivery']]);
            return response()->json([$user],200);
        } catch (\Throwable $th) { dump($th->getMessage()); return response()->json(['error'],500); }
    }

    public function registerImages(Request $request)
    {
        try {
            $data = $request->all();
            $store_image = File::registerStoreImages($data);
            return response()->json([$store_image],200);
        } catch (\Throwable $th) { dd($th->getMessage()); return response()->json(['error'],500); }
    }

    public function registerBank(Request $request)
    {
        try {
            $data = $request->all();
            $store = User::findOrFail($data['id'])->update($data);
            return response()->json([$store],200);
        } catch (\Throwable $th) { dd($th->getMessage()); return response()->json(['error'],500); }
    }
}
