<?php

use App\Http\Controllers\Shop\Member\MemberController;
use App\Http\Controllers\Shop\Member\TransactionController;
use App\Http\Controllers\Shop\Member\TripayController;
use App\Http\Controllers\Shop\Guest\WebController;
use Illuminate\Support\Facades\Route;

Route::controller(WebController::class)->prefix('web')->group(function () {
    Route::get('details', 'details');
    Route::get('category', 'category');
    Route::get('search', 'search');
    Route::get('categories', 'categories');
    Route::get('show', 'show');
});

Route::controller(MemberController::class)->middleware('auth.jwt')->prefix('member')->group(function () {
    Route::get('/stash', 'getStash');
    Route::post('/stash', 'storeStash');
    Route::delete('/stash', 'destroyStash');
    Route::get('/download/web', 'downloadWeb');
    Route::get('/download/transactions', 'downloadTransactions');
    Route::post('/upload-profile-image', 'uploadProfileImage');
    Route::post('/otp/send-mail', 'sendMailOtp');
    Route::post('/otp/verify', 'verifyOtp');
    Route::put('/update-data', 'updateData');
    Route::put('/update-authentication', 'updateAuthentication');
});

Route::controller(TransactionController::class)->middleware('auth.jwt')->prefix('transaction')->group(function () {
    Route::post('/member', 'member');
    Route::post('/purchase', 'purchase');
    Route::post('/history', 'history');
    Route::post('/latest', 'latest');
});

Route::controller(TripayController::class)->middleware('auth.jwt')->prefix('tripay')->group(function () {
    Route::get('/banks', 'banks');
    Route::post('/payment', 'payment');
    Route::post('/detail', 'detail');
});

Route::post('/tripay/callback', [TripayController::class, 'handle']);
