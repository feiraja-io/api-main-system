<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;

Route::prefix('/store')->group(function () {
    Route::post('/',[StoreController::class,'store']);
    Route::get('/{id}',[StoreController::class,'show']);
});
