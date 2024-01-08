<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
    Route::post('/me', 'me');
    Route::post('/refresh', 'refresh');
    Route::post('/logout', 'logout');
    Route::post('/google', 'google');
});
