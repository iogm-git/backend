<?php

namespace App\Http\Controllers\Code\Guest;

use App\Helpers\ResponseApiHelper;
use App\Http\Controllers\Controller;
use App\Models\Code\General\Member;
use App\Models\Code\Instructor\Studies\Courses;
use App\Models\Code\Student\Certificates;

class VisitorsController extends Controller
{
    public function getMember()
    {
        return Member::where('username', request('username'));
    }

    public function register()
    {
        $member = $this->getMember();
        if ($member->exists()) {
            return ResponseApiHelper::customApiResponse(true, null, 'Your account is already registered as ' . $member->first()->role);
        } else {
            $success = Member::create([
                'username' => request('username'),
                'role' => request('role'),
            ]);

            return ResponseApiHelper::customApiResponse($success, null, 'Data successfully added to the database.', 'Failed to add data to the database.');
        }
    }

    public function getSearchCourse()
    {
        return ResponseApiHelper::customApiResponse(true, Courses::where('title', 'like', '%' . request('title') . '%')->get('title'), 'Data retrieved successfully.');
    }

    public function verifyCertificate()
    {
        $certificate = Certificates::where('id', request('id'));

        if ($certificate->exists()) {
            return ResponseApiHelper::customApiResponse(true, $certificate->first(), 'Data retrieved successfully.');
        } else {
            return ResponseApiHelper::customApiResponse(false, null, null, '
            Certificate not found');
        }
    }
}
