<?php

use App\Http\Controllers\Code\Guest\VisitorsController;
use Illuminate\Support\Facades\Route;

Route::controller(VisitorsController::class)->prefix('visitor')->group(function () {
    Route::post('register', 'register');
    Route::get('search-course', 'getSearchCourse');
    Route::get('verify-certificate', 'verifyCertificate');
});
