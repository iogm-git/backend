<?php

namespace App\Http\Controllers\Code\Member\General;

use App\Helpers\ResponseApiHelper;
use App\Http\Controllers\Controller;
use App\Models\Code\General\Member;
use App\Models\User\Member as CoreMember;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    public function getMember()
    {
        return Member::where('username', request('username'));
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
}
