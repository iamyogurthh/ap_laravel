<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::resource('posts', HomeController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
