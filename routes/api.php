<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('/items', [\App\Http\Controllers\ItemController::class, 'index']);
Route::resource('/item', \App\Http\Controllers\ItemController::class);
