<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;


Route::get('/hello', function () {
    return view('hello');
});

Route::prefix('api')->withoutMiddleware('web')->group(function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('profiles', ProfileController::class);
    Route::apiResource('posts', PostController::class);
    Route::apiResource('tags', TagController::class);
});
