<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return resolve('test')->execute();
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/posts', [HomeController::class, 'index']);
    Route::resource('posts', HomeController::class);
});

Route::get('logout', [AuthController::class, 'logout']);