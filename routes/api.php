<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProductController;

Route::prefix('/store')->group(function () {
    Route::post('/',[StoreController::class,'store']);
    Route::get('/{id}',[StoreController::class,'show']);
});

Route::prefix('/product')->group(function () {
    Route::post('/',[ProductController::class,'store']);
    Route::get('/{id}',[ProductController::class,'show']);
});
