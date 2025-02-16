<?php

use App\Http\Controllers\BusinessTypeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;


Route::post('/login',[UserController::class,'login']);

Route::post('/register',[UserController::class,'registerStore']);

Route::prefix('/store')->group(function () {
    Route::post('/',[StoreController::class,'store']);
    Route::get('/',[StoreController::class,'index']);
    Route::get('/{id}',[StoreController::class,'show']);
});

Route::get('/business_types',[BusinessTypeController::class,'index']);

Route::prefix('/product')->group(function () {
    Route::post('/',[ProductController::class,'store']);
    Route::get('/',[ProductController::class,'index']);
    Route::get('/{id}',[ProductController::class,'show']);
});
