<?php

use App\Http\Controllers\User\GuestController;
use Illuminate\Support\Facades\Route;

Route::controller(GuestController::class)->prefix('auth')->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::post('me', 'me');
    Route::post('refresh', 'refresh');
    Route::post('logout', 'logout');
    Route::post('google', 'google');
});
