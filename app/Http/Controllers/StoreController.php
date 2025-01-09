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

    public function show($id)
    {
        try { return response()->json([Store::findOrFail($id)],200); }
        catch (\Throwable $th) { return response()->json(['error'],404); }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        //
    }
}
