<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Service\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json([Product::all()],200);
    }


    public function store(Request $request)
    {
        try {
            $product = ProductService::create($request->all());
            return response()->json([$product],200);
        }
        catch (\Throwable $th) { return response()->json(['error'],500); }
    }

    public function show($id)
    {
        try { return response()->json([ProductService::get($id)],200); }
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
