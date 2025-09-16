<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('api')->group(function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('profiles', ProfileController::class);
    Route::apiResource('posts', PostController::class);
    Route::apiResource('tags', TagController::class);
});