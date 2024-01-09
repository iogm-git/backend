<?php

namespace App\Http\Controllers\Code;

use App\Helpers\ResponseApiHelper;
use App\Http\Controllers\Controller;
use App\Models\Code\Instructor\Studies\Courses;
use App\Models\Code\Member;
use App\Models\Member as CoreMember;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
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

    public function updateDOBandAddress()
    {
        $validator = Validator::make(request()->all(), [
            'dob' => 'nullable|date',
            'address' => 'nullable|string|min:5'
        ]);

        if ($validator->fails()) {
            return ResponseApiHelper::customApiResponse(false, null, null, $validator->errors());
        }

        $success = Member::where('username', request('username'))->update([
            'dob' => request('dob'),
            'address' => request('address'),
        ]);

        return ResponseApiHelper::customApiResponse($success, null, 'Data successfully update to the database.', 'Failed to update data to the database.');
    }

    public function getPhotoProfile()
    {
        if ($this->getMember()->exists()) {
            return ResponseApiHelper::customApiResponse(true, CoreMember::where('username', request('username'))->first(), 'Data retrieved successfully.');
        } else {
            return ResponseApiHelper::customApiResponse(false, null, null, 'Data was not successfully retrieved.');
        }
    }

    public function getSearchCourse()
    {
        return ResponseApiHelper::customApiResponse(true, Courses::where('title', 'like', '%' . request('title') . '%')->get('title'), 'Data retrieved successfully.');
    }
}
