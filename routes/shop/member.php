<?php

use App\Http\Controllers\Shop\Member\MemberController;
use App\Http\Controllers\Shop\Member\TransactionController;
use App\Http\Controllers\Shop\Member\TripayController;
use Illuminate\Support\Facades\Route;

Route::controller(MemberController::class)->group(function () {
    Route::get('stash', 'getStash');
    Route::post('stash', 'storeStash');
    Route::delete('stash', 'destroyStash');
    Route::get('download/web', 'downloadWeb');
    Route::get('download/transactions', 'downloadTransactions');
});

Route::controller(TransactionController::class)->middleware('email-otp-verification')->prefix('transaction')->group(function () {
    Route::post('information', 'information');
    Route::post('purchase', 'purchase');
    Route::post('history', 'history');
    Route::post('latest', 'latest');
});

Route::controller(TripayController::class)->prefix('tripay')->group(function () {
    Route::get('banks', 'banks');
    Route::post('payment', 'payment');
    Route::post('detail', 'detail');
});

Route::post('tripay/callback', [TripayController::class, 'handle']);
