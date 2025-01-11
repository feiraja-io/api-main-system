<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;


Route::post('/login',[UserController::class,'login']);

Route::prefix('/register')->group(function () {
    Route::post('/step-1',[UserController::class,'registerStore']);
    Route::post('/step-2',[UserController::class,'registerAddresses']);
    Route::post('/step-3',[UserController::class,'registerImages']);
    Route::post('/step-4',[UserController::class,'registerBank']);

});

Route::prefix('/store')->group(function () {
    Route::post('/',[StoreController::class,'store']);
    Route::get('/',[StoreController::class,'index']);
    Route::get('/{id}',[StoreController::class,'show']);
});

Route::prefix('/product')->group(function () {
    Route::post('/',[ProductController::class,'store']);
    Route::get('/',[ProductController::class,'index']);
    Route::get('/{id}',[ProductController::class,'show']);
});
