<?php

namespace App\Http\Controllers\Code\Member\Student;

use App\Helpers\ResponseApiHelper;
use App\Http\Controllers\Controller;
use App\Models\Code\Student\Certificates;
use App\Models\Code\Student\CourseProgress;
use App\Models\Code\Student\Questions;
use App\Models\Code\Student\Stash;
use App\Models\Code\Student\Transactions;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function getStash()
    {
        return Stash::where('student_id', request('student_id'));
    }

    public function getProfile()
    {
        $certificates = Certificates::where('student_id', request('student_id'))->get();
        $courseProgress = CourseProgress::where('student_id', request('student_id'))->get();
        $stash = $this->getStash()->get();
        $transactions = Transactions::where('student_id', request('student_id'))->get();
        $questions = Questions::where('student_id', request('student_id'));

        return ResponseApiHelper::customApiResponse(true, compact('certificates', 'courseProgress', 'stash', 'transactions', 'questions'));
    }

    public function storeStash()
    {
        if ($this->getStash()->where('course_id', request('course_id'))->exists()) {
            return ResponseApiHelper::customApiResponse(false, null, null, 'Stash has been added.');
        }

        $success = Stash::create([
            'student_id' => request('student_id'),
            'course_id' => request('course_id')
        ]);

        return ResponseApiHelper::customApiResponse($success, null, 'Stash successfully added.', 'Stash failed to add.');
    }

    public function destroyStash()
    {
        $success = $this->getStash()->where('course_id', request('course_id'))->delete();

        return ResponseApiHelper::customApiResponse($success, null, 'Stash successfully deleted.', 'Stash failed to delete.');
    }

    public function storeQuestion()
    {
        $validator = Validator::make(['question' => request('question')], [
            'question' => 'required|no_bad_words|string|min:5'
        ]);

        if ($validator->fails()) {
            return ResponseApiHelper::customApiResponse(false, null, null, $validator->errors());
        }

        $success = Questions::create([
            'course_id' => request('course_id'),
            'student_id' => request('student_id'),
            'question' => request('question')
        ]);

        return ResponseApiHelper::customApiResponse($success, null, 'Data successfully added to the database.', 'Failed to add data to the database.');
    }
}
