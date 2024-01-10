<?php

use App\Http\Controllers\Shop\Guest\WebController;
use Illuminate\Support\Facades\Route;

Route::controller(WebController::class)->prefix('web')->group(function () {
    Route::get('details', 'details');
    Route::get('category', 'category');
    Route::get('search', 'search');
    Route::get('categories', 'categories');
    Route::get('show', 'show');
});
