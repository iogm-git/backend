<?php

use App\Http\Controllers\Code\Guest\MidtransController;
use Illuminate\Support\Facades\Route;

Route::controller(MidtransController::class)->group(function () {
    Route::post('callback', 'callback');
    Route::get('test', 'test');
});
