<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function index()
    {
        return response()->json([Store::all()],200);
    }

    public function store(Request $request)
    {
        $store = Store::register($request->all())->address()->create($request->get('address'));
        return response()->json([$store],200);
    }

    public function show($id)
    {
        try { return response()->json([Store::findOrFail($id)],200); }
        catch (\Throwable $th) { return response()->json(['error'],404); }
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return response()->json(["succsess"],200);
        }
        return response()->json(['error'],500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        //
    }
}
