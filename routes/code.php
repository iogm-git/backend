<?php

use App\Http\Controllers\Code\MemberController;
use App\Http\Controllers\Code\General\DiscussionForumsController;
use App\Http\Controllers\Code\Instructor\PersonalizeController;
use App\Http\Controllers\Code\Instructor\StudiesController;
use App\Http\Controllers\Code\Student\CoursesController;
use App\Http\Controllers\Code\Student\ProfileController;
use App\Http\Controllers\Code\Student\TransactionsController;
use Illuminate\Support\Facades\Route;

// Member routes
Route::controller(MemberController::class)->prefix('member')->group(function () {
    Route::post('register', 'register');
    Route::put('dob-address', 'updateDOBandAddress');
    Route::get('photo-profile', 'getPhotoProfile');
    Route::get('search-course', 'getSearchCourse');
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
        Route::get('studies', 'getStudies');
        Route::get('studies/latest', 'getStudiesLatest');
        Route::post('course', 'storeCourse');
        Route::put('course', 'updateCourse');
        Route::post('section', 'storeSection');
        Route::put('section', 'updateSection');
        Route::post('lesson', 'storeLesson');
        Route::put('lesson', 'updateLesson');
    });
});

// Student routes
Route::prefix('student')->group(function () {

    // Course routes
    Route::controller(CoursesController::class)->middleware('checkPaidStatus')->group(function () {
        Route::get('course', 'getCourse');
        Route::get('section', 'getSection');
        Route::get('lesson', 'getLesson');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::get('profile', 'getProfile');
        Route::post('stash', 'storeStash');
        Route::delete('stash', 'destroyStash');
        Route::post('question', 'storeQuestion');
    });

    Route::controller(TransactionsController::class)->group(function () {
        Route::post('transaction', 'store');
    });
});
