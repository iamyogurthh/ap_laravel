<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::resource('posts', HomeController::class);
