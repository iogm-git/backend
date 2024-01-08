<?php

namespace App\Http\Controllers\Code\Instructor;

use App\Helpers\ResponseApiHelper;
use App\Http\Controllers\Controller;
use App\Models\Code\Instructor\Studies\Courses;
use Illuminate\Support\Facades\Validator;

class StudiesController extends Controller
{
    public function getCourse()
    {
        return ResponseApiHelper::customApiResponse(true, Courses::all(), 'Data retrieved successfully.');
    }

    public function storeCourse()
    {
        $validator = Validator::make(request()->all(), [
            'title' => 'required|no_bad_words|string|unique_from_model:App\Models\Code\Instructor\Studies\Courses,title',
            'description' => 'required|no_bad_words|string|min:5',
            'price' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return ResponseApiHelper::customApiResponse(false, null, null, $validator->errors());
        }

        $success = Courses::create([
            'instructor_id' => request('instructor_id'),
            'title' => request('title'),
            'description' => request('description'),
            'price' => request('price')
        ]);

        return ResponseApiHelper::customApiResponse($success, null, 'Data successfully added to the database.', 'Failed to add data to the database.');
    }

    public function updateCourse()
    {
        $validator = Validator::make(request()->all(), [
            'description' => 'required|no_bad_words|string|min:5',
            'price' => 'required|numeric'
        ]);

        $course = Courses::where('instructor_id', request('instructor_id'))->first();

        if (!$course) {
            return ResponseApiHelper::customApiResponse(false, null, null, 'Data was not successfully retrieved.');
        }

        $title = $course->title;

        if ($course->title != request('title')) {
            $validatorTitle = Validator::make(['title' => request('title')], [
                'title' => 'required|no_bad_words|string|unique_from_model:App\Models\Code\Instructor\Studies\Courses,title'
            ]);

            if ($validatorTitle->fails()) {
                return ResponseApiHelper::customApiResponse(false, null, null, $validatorTitle->errors());
            }

            global $title;

            $title = request('title');
        }


        if ($validator->fails()) {
            return ResponseApiHelper::customApiResponse(false, null, null, $validator->errors());
        }

        $success = $course->update([
            'title' => $title,
            'description' => request('description'),
            'price' => request('price')
        ]);

        return ResponseApiHelper::customApiResponse($success, null, 'Data successfully update to the database.', 'Failed to update data to the database.');
    }
}
