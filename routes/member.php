<?php

use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

Route::controller(MemberController::class)->group(function () {
    Route::post('upload-profile-image', 'uploadProfileImage');
    Route::post('otp/send-mail', 'sendMailOtp');
    Route::post('otp/verify', 'verifyOtp');
    Route::put('update-data', 'updateData');
    Route::put('update-authentication', 'updateAuthentication');
});
