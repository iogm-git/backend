<?php

namespace App\Http\Controllers\Code\Instructor;

use App\Helpers\ResponseApiHelper;
use App\Http\Controllers\Controller;
use App\Models\Code\Instructor\Personalize\Answers;
use App\Models\Code\Instructor\Personalize\CourseReviews;
use App\Models\Code\Instructor\Personalize\Earnings;
use Illuminate\Support\Facades\Validator;

class PersonalizeController extends Controller
{
    public function getDataPersonalization()
    {
        return ResponseApiHelper::customApiResponse(true, ['answers' => Answers::latest('created_at')->get(), 'course_reviews' => CourseReviews::all(), 'Earnings' => Earnings::latest('recorded_at')->get()], 'Data retrieved successfully.');
    }

    public function storeAnswerQuestions()
    {
        $validator = Validator::make(['answer' => request('answer')], [
            'answer' => 'required|no_bad_words|string|min:5'
        ]);

        if ($validator->fails()) {
            return ResponseApiHelper::customApiResponse(false, null, null, $validator->errors());
        }

        $success = Answers::create([
            'question_id' => request('question_id'),
            'instructor_id' => request('instructor_id'),
            'answer' => request('answer')
        ]);

        return ResponseApiHelper::customApiResponse($success, null, 'Data successfully added to the database.', 'Failed to add data to the database.');
    }

    public function updateAnswerQuestions()
    {
        $answer = Answers::where('question_id', request('question_id'))->where('instructor_id', request('instructor_id'));

        if (!$answer->exists()) {
            return ResponseApiHelper::customApiResponse(false, null, null, 'Answer not found.');
        }

        $validator = Validator::make(['answer' => request('answer')], [
            'answer' => 'required|no_bad_words|string|min:5'
        ]);

        if ($validator->fails()) {
            return ResponseApiHelper::customApiResponse(false, null, null, $validator->errors());
        }

        $success = $answer->update([
            'answer' => request('answer')
        ]);

        return ResponseApiHelper::customApiResponse($success, null, 'Data successfully update to the database.', 'Failed to update data to the database.');
    }
}
