<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Address;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        return response()->json([Store::all()],200);
    }

    public function store(Request $request)
    {
        $store = Store::encode_create($request->all())->address()->create($request->get('address'));
        return response()->json([$store],200);
    }

    public function show($id)
    {
        try { return response()->json([Store::findOrFail($id)],200); }
        catch (\Throwable $th) { return response()->json(['error'],404); }
    }

    public function login(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        //
    }
}
