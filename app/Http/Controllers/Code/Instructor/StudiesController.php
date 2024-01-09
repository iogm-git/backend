<?php

namespace App\Http\Controllers\Code\Instructor;

use App\Helpers\ResponseApiHelper;
use App\Http\Controllers\Controller;
use App\Models\Code\Instructor\Studies\Courses;
use App\Models\Code\Instructor\Studies\Lessons;
use App\Models\Code\Instructor\Studies\Sections;
use Illuminate\Support\Facades\Validator;

class StudiesController extends Controller
{
    public function getStudies()
    {
        return ResponseApiHelper::customApiResponse(true, Courses::paginate(request('perPage')), 'Data retrieved successfully.');
    }

    public function getStudiesLatest()
    {
        return ResponseApiHelper::customApiResponse(true, Courses::latest('updated_at')->paginate(request('perPage')), 'Data retrieved successfully.');
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
            'price' => request('price'),
            'updated_at' => now()
        ]);

        return ResponseApiHelper::customApiResponse($success, null, 'Data successfully update to the database.', 'Failed to update data to the database.');
    }

    public function storeSection()
    {
        $validator = Validator::make(request()->all(), [
            'title' => 'required|no_bad_words|string|unique_from_model:App\Models\Code\Instructor\Studies\Sections,title',
            'order_in_course' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return ResponseApiHelper::customApiResponse(false, null, null, $validator->errors());
        }

        $success = Sections::create([
            'course_id' => request('course_id'),
            'title' => request('title'),
            'order_in_course' => request('order_in_course'),
        ]);

        return ResponseApiHelper::customApiResponse($success, null, 'Data successfully added to the database.', 'Failed to add data to the database.');
    }

    public function updateSection()
    {
        $validator = Validator::make(request()->all(), [
            'order_in_course' => 'required|numeric'
        ]);

        $section = Sections::where('id', request('id'))->first();

        if (!$section) {
            return ResponseApiHelper::customApiResponse(false, null, null, 'Data was not successfully retrieved.');
        }

        $title = $section->title;

        if ($section->title != request('title')) {
            $validatorTitle = Validator::make(['title' => request('title')], [
                'title' => 'required|no_bad_words|string|unique_from_model:App\Models\Code\Instructor\Studies\Sections,title'
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

        $success = $section->update([
            'title' => $title,
            'order_in_course' => request('order_in_course'),
            'updated_at' => now()
        ]);

        return ResponseApiHelper::customApiResponse($success, null, 'Data successfully update to the database.', 'Failed to update data to the database.');
    }

    public function storeLesson()
    {
        $validator = Validator::make(request()->all(), [
            'title' => 'required|no_bad_words|string|unique_from_model:App\Models\Code\Instructor\Studies\Sections,title',
            'code' => 'required|no_bad_words|string',

        ]);

        if ($validator->fails()) {
            return ResponseApiHelper::customApiResponse(false, null, null, $validator->errors());
        }

        $success = Lessons::create([
            'section_id' => request('section_id'),
            'title' => request('title'),
            'code' => request('code'),
            'order_in_section' => request('order_in_section'),
        ]);

        return ResponseApiHelper::customApiResponse($success, null, 'Data successfully added to the database.', 'Failed to add data to the database.');
    }

    public function updateLesson()
    {
        $validator = Validator::make(request()->all(), [
            'code' => 'required|no_bad_words|string',
            'order_in_section' => 'required|numeric'
        ]);

        $section = Lessons::where('id', request('id'))->first();

        if (!$section) {
            return ResponseApiHelper::customApiResponse(false, null, null, 'Data was not successfully retrieved.');
        }

        $title = $section->title;

        if ($section->title != request('title')) {
            $validatorTitle = Validator::make(['title' => request('title')], [
                'title' => 'required|no_bad_words|string|unique_from_model:App\Models\Code\Instructor\Studies\Sections,title'
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

        $success = $section->update([
            'title' => $title,
            'code' => request('code'),
            'order_in_section' => request('order_in_section'),
            'updated_at' => now()
        ]);

        return ResponseApiHelper::customApiResponse($success, null, 'Data successfully update to the database.', 'Failed to update data to the database.');
    }
}
