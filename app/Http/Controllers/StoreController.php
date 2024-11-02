<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Address;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $store = Store::create($request->all())->address()->create($request->get('address'));
        return response()->json([$store],200);
    }

    public function show($id)
    {
        try { return response()->json([Store::findOrFail($id)],200); }
        catch (\Throwable $th) { return response()->json(['error'],404); }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Store $store)
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
