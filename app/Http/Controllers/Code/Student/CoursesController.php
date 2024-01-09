<?php

namespace App\Http\Controllers\Code\Student;

use App\Helpers\ResponseApiHelper;
use App\Http\Controllers\Controller;
use App\Models\Code\Instructor\Studies\Courses;
use App\Models\Code\Instructor\Studies\Lessons;
use App\Models\Code\Instructor\Studies\Sections;

class CoursesController extends Controller
{
    //
    public function getCourse()
    {
        return ResponseApiHelper::customApiResponse(true, Courses::whereIn('id', request('course_id'))->get(), 'Data retrieved successfully.', 'Data failed to retrieved.');
    }

    public function getSection()
    {
        return ResponseApiHelper::customApiResponse(true, Sections::where('course_id', request('course_id'))->get(), 'Data retrieved successfully.', 'Data failed to retrieved.');
    }

    public function getLesson()
    {
        return ResponseApiHelper::customApiResponse(true, Lessons::where('section_id', request('section_id'))->get(), 'Data retrieved successfully.', 'Data failed to retrieved.');
    }
}
