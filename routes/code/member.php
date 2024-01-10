<?php

use App\Http\Controllers\Code\Member\General\MemberController;
use App\Http\Controllers\Code\Member\General\DiscussionForumsController;

use App\Http\Controllers\Code\Member\Instructor\PersonalizeController;
use App\Http\Controllers\Code\Member\Instructor\StudiesController;

use App\Http\Controllers\Code\Member\Student\CoursesController;
use App\Http\Controllers\Code\Member\Student\ProfileController;
use App\Http\Controllers\Code\Member\Student\TransactionsController;

use Illuminate\Support\Facades\Route;

// General routes
Route::prefix('general')->group(function () {

    // Member routes
    Route::controller(MemberController::class)->group(function () {
        Route::put('dob-address', 'updateDOBandAddress');
        Route::get('photo-profile', 'getPhotoProfile');
    });

    // General Discussion Forums routes
    Route::controller(DiscussionForumsController::class)->group(function () {
        Route::get('discussion-forums', 'getData');
        Route::post('discussion-forums', 'store');
        Route::get('discussion-forums/categories', 'getCategories');
    });
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
    Route::controller(CoursesController::class)->middleware('check-paid-status')->group(function () {
        Route::get('course', 'getCourse');
        Route::get('section', 'getSection');
        Route::get('lesson', 'getLesson');
        Route::put('completed-lectures', 'updateCompletedLectures');
        Route::get('download-certificate', 'downloadCertificate');
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
