<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json([Product::all()],200);
    }


    public function store(Request $request)
    {
        $store = Product::create($request->all());
        return response()->json([$store],200);
    }

    public function show($id)
    {
        try { return response()->json([Product::findOrFail($id)],200); }
        catch (\Throwable $th) { return response()->json(['error'],404); }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
