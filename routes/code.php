<?php

use App\Http\Controllers\Code\MemberController;
use App\Http\Controllers\Code\General\DiscussionForumsController;
use App\Http\Controllers\Code\Instructor\PersonalizeController;
use App\Http\Controllers\Code\Instructor\StudiesController;
use Illuminate\Support\Facades\Route;

// Member routes
Route::controller(MemberController::class)->prefix('member')->group(function () {
    Route::post('register', 'register');
    Route::put('dob-address', 'updateDOBandAddress');
    Route::get('photo-profile', 'getPhotoProfile');
});

// General Discussion Forums routes
Route::controller(DiscussionForumsController::class)->prefix('general')->group(function () {
    Route::get('discussion-forums', 'getDiscussionForums');
    Route::post('discussion-forums', 'storeDiscussionForums');
    Route::get('discussion-forums/categories', 'getDiscussionForumsCategories');
});

// Instructor routes
Route::prefix('instructor')->group(function () {

    // Personalize routes
    Route::controller(PersonalizeController::class)->group(function () {
        Route::get('data-personalization', 'getDataPersonalization');
        Route::post('answer-questions', 'storeAnswerQuestions');
        Route::put('answer-questions', 'updateAnswerQuestions');
    });

    // Studies routes
    Route::controller(StudiesController::class)->group(function () {
        Route::get('course', 'getCourse');
        Route::post('course', 'storeCourse');
        Route::put('course', 'updateCourse');
    });
});
