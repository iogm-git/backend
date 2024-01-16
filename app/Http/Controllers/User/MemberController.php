<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Helpers\ResponseApiHelper;
use App\Mail\Otp;
use App\Models\User\Member;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MemberController extends Controller
{
    public function findMember()
    {
        return Member::find(request('id'));
    }

    public function uploadProfileImage()
    {
        $image = 'profile.svg';
        $oldImage = $this->findMember()->image;

        if (request('image') == 'profile.svg') {
            if ($oldImage != 'profile.svg' && !str_contains('https://', $oldImage)) {
                $success = Storage::delete('public/images/' . $oldImage);
                if (!$success) {
                    return ResponseApiHelper::customApiResponse(false, null, null, 'File failed to delete.');
                }
            }
        } else {
            if ($oldImage != 'profile.svg' && !str_contains('https://', $oldImage)) {
                $success = Storage::delete('public/images/' . $oldImage);
                if (!$success) {
                    return ResponseApiHelper::customApiResponse(false, null, null, 'File failed to delete.');
                }
            }
            $image = Str::uuid() . '.png';
            $success = Storage::disk('local')->put('public/images/' . $image, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', request('image'))));
            if (!$success) {
                return ResponseApiHelper::customApiResponse(false, null, null, 'File failed to put.');
            }
        }

        $success = $this->findMember()->update(['image' => $image]);

        return ResponseApiHelper::customApiResponse($success, null, 'Image uploaded successfully.', 'Image failed to upload.');
    }

    public function sendMailOtp()
    {
        try {
            $otp = mt_rand(1000, 9999);
            Mail::to(request('email'))->send(new Otp($otp));
            Member::find(request('id'))->update(['otp' => $otp]);
            return ResponseApiHelper::customApiResponse(true, null, 'Email sent successfully.');
        } catch (\Exception $e) {
            return ResponseApiHelper::customApiResponse(false, null, null, 'Failed to send OTP. ' . $e->getMessage());
        }
    }

    public function verifyOtp()
    {
        $member = Member::find(request('id'));
        if ($member->first()->otp == request('otp')) {
            $member->update(['verification_at' => now()]);
            return ResponseApiHelper::customApiResponse(true, null, 'Data updated successfully.');
        } else {
            return ResponseApiHelper::customApiResponse(false, null, null, 'Data failed to update.');
        }
    }

    public function updateData()
    {
        $success = $this->findMember()->update(request('data'));

        return ResponseApiHelper::customApiResponse($success, null, 'Data successfully added to the database.', 'Failed to add data to the database.');
    }

    public function updateAuthentication()
    {
        $oldUsername = $this->findMember()->username;
        if ($oldUsername !== request('username')) {
            $validator = Validator::make(request()->all(), [
                'username' => 'required|unique_from_model:App\Models\User\Member,username|min:4',
                'name' => 'required|min:4'
            ]);
        } else {
            $validator = Validator::make(request()->all(), [
                'username' => 'required',
                'name' => 'required|min:4'
            ]);
        }

        if ($validator->fails()) {
            return ResponseApiHelper::customApiResponse(false, null, null, $validator->errors());
        }


        $success = $this->findMember()->update(['username' => request('username'), 'name' => request('name')]);

        return ResponseApiHelper::customApiResponse($success, null, 'Data successfully update to the database.', 'Failed to update data to the database.');
    }
}
