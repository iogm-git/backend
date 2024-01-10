<?php

namespace App\Http\Controllers\Code\Member\Student;

use App\Helpers\ResponseApiHelper;
use App\Http\Controllers\Controller;
use App\Models\Code\Instructor\Studies\Courses;
use App\Models\Code\Instructor\Studies\Lessons;
use App\Models\Code\Instructor\Studies\Sections;
use App\Models\Code\Student\Certificates;
use App\Models\Code\Student\CourseProgress;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Carbon\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;

class CoursesController extends Controller
{
    public function findSection()
    {
        return Sections::where('course_id', request('course_id'));
    }

    public function findCourseProgress()
    {
        return CourseProgress::where('course_id', request('course_id')[0])->where('student_id', request('student_id'));
    }

    public function findCertificate()
    {
        return Certificates::where('course_id', request('course_id')[0])->where('student_id', request('student_id'));
    }

    public function getCourse()
    {
        return ResponseApiHelper::customApiResponse(true, Courses::whereIn('id', request('course_id'))->get(), 'Data retrieved successfully.', 'Data failed to retrieved.');
    }

    public function getSection()
    {
        return ResponseApiHelper::customApiResponse(true, $this->findSection()->get(), 'Data retrieved successfully.', 'Data failed to retrieved.');
    }

    public function getLesson()
    {
        return ResponseApiHelper::customApiResponse(true, Lessons::where('section_id', request('section_id'))->get(), 'Data retrieved successfully.', 'Data failed to retrieved.');
    }

    public function updateCompletedLectures()
    {
        $perProgress = 100 / $this->findSection()->count();

        $completedLectures = $this->findCourseProgress()->first()->completed_lectures;

        $progress = $completedLectures + $perProgress;

        if ($progress >= 100) {
            $progress = 100;

            if (!$this->findCertificate()->exists()) {

                $success = Certificates::create([
                    'id' => Str::uuid(),
                    'course_id' => request('course_id')[0],
                    'student_id' => request('student_id')
                ]);

                return ResponseApiHelper::customApiResponse($success, null, 'You can download the certificate.', 'Data failed to update.');
            } else {
                return ResponseApiHelper::customApiResponse(true, null, 'You can download the certificate.', 'Data failed to update.');
            }
        } elseif ($progress >= 90) {
            $progress = ceil($progress);
        }


        $success = $this->findCourseProgress()->update(['completed_lectures' => $progress]);
        return ResponseApiHelper::customApiResponse($success, null, 'Data updated successfully.', 'Data failed to update.');
    }

    public function downloadCertificate()
    {
        $certificate = $this->findCertificate()->first();
        $courseName = $certificate->course->title;
        $studentName = $certificate->student->name;
        $certificationId = $certificate->id;
        $issuesDate = Carbon::parse($certificate->created_at)->format('d M Y');
        $expirationDate = Carbon::parse($certificate->created_at)->addYears(2)->format('d M Y');

        // Combine course name and student name for QR code data
        $qrData = "$courseName - $studentName";

        // Generate QR code
        $qrCode = QrCode::size(300)->generate($qrData);

        // Generate PDF
        $pdf = FacadePdf::loadView('code.pdf.student-certificates', compact('courseName', 'studentName', 'qrCode', 'certificationId', 'issuesDate', 'expirationDate'));
        $pdf->setPaper('A4', 'landscape');

        // Download 
        return $pdf->download($certificationId . '.pdf');
    }
}
