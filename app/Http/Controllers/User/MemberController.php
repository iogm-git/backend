<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Helpers\ResponseApiHelper;
use App\Mail\Otp;
use App\Models\Code\General\Member as CodeMember;
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

    public function compressAndSaveImage($base64Image)
    {
        // Decode the base64 image data
        $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));

        // Create a GD image from the decoded image data
        $image = imagecreatefromstring($imageData);

        if ($image === false) {
            return ResponseApiHelper::customApiResponse(false, null, null, 'Failed to create GD image from base64 data.');
        }

        // Generate a unique filename using Str::uuid() for the compressed image
        $compressedImageName = Str::uuid() . '.jpg';

        // Resize the image (you can adjust the dimensions)
        $newWidth = imagesx($image) * 0.1;
        $newHeight = imagesy($image) * 0.1;
        $resizedImage = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($resizedImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, imagesx($image), imagesy($image));

        // Save the compressed image
        $success = imagejpeg($resizedImage, storage_path('app/public/images/' . $compressedImageName), 80); // Adjust compression quality (0-100)

        imagedestroy($image);
        imagedestroy($resizedImage);

        if (!$success) {
            return ResponseApiHelper::customApiResponse(false, null, null, 'Failed to save the compressed image.');
        }

        return $compressedImageName;
    }

    public function uploadProfileImage()
    {
        $image = 'profile.svg';
        $oldImage = $this->findMember()->image;

        // Check if the request contains image data
        if (request()->has('image') && request('image') !== 'profile.svg') {

            // Delete the old image if it exists and is not a default profile.svg
            if ($oldImage !== 'profile.svg' && !str_contains($oldImage, 'https://')) {
                $success = Storage::delete('public/images/' . $oldImage);
                if (!$success) {
                    return ResponseApiHelper::customApiResponse(false, null, null, 'Failed to delete the old image.');
                }
            }

            // Compress and save the image
            $image = $this->compressAndSaveImage(request('image'));

            if ($image === false) {
                return ResponseApiHelper::customApiResponse(false, null, null, 'Failed to compress and save the new image.');
            }
        } else if (request()->has('image')) {
            // Delete the old image if it exists and is not a default profile.svg
            if ($oldImage !== 'profile.svg' && !str_contains($oldImage, 'https://')) {
                $success = Storage::delete('public/images/' . $oldImage);
                if (!$success) {
                    return ResponseApiHelper::customApiResponse(false, null, null, 'Failed to delete the old image.');
                }
            }
        } else {
            return ResponseApiHelper::customApiResponse(false, null, null, 'Need parameter image.');
        }

        // Update the member's image field with the new or default image
        $success = $this->findMember()->update(['image' => $image]);

        // Return the API response based on the success of the operation
        return ResponseApiHelper::customApiResponse($success, null, $success ? 'Image uploaded and compressed successfully.' : 'Image failed to upload and compress.');
    }

    public function sendMailOtp()
    {
        try {
            $validator = Validator::make(['email' => request('email')], [
                'email' => 'required|email:dns'
            ]);

            if ($validator->fails()) {
                return ResponseApiHelper::customApiResponse(false, null, null, $validator->errors());
            }

            if (request('email') === 'ilhamrhmtkbr@gmail.com') {
                return ResponseApiHelper::customApiResponse(false, null, null, ['email' => ['Jangan pake email itu']]);
            }

            $otp = mt_rand(1000, 9999);
            Mail::to(request('email'))->send(new Otp($otp));
            Member::find(request('id'))->update(['email' => request('email'), 'otp' => $otp]);
            return ResponseApiHelper::customApiResponse(true, null, 'The OTP code was successfully sent to the email address: ' . request('email'));
        } catch (\Exception $e) {
            return ResponseApiHelper::customApiResponse(false, null, null, 'Failed to send OTP. ' . $e->getMessage());
        }
    }

    public function verifyOtp()
    {
        if ($this->findMember()->otp == request('otp')) {
            $this->findMember()->update(['email' => request('email'), 'verification_at' => now(), 'otp' => null]);
            return ResponseApiHelper::customApiResponse(true, null, 'Email verification successful.');
        } else {
            return ResponseApiHelper::customApiResponse(false, [request('otp'), $this->findMember()], null, 'The OTP you entered is not the same.');
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


        $updateUserMember = $this->findMember()->update(['username' => request('username'), 'name' => request('name')]);
        $codeMember = CodeMember::where('username', request('username'));

        $updateCodeMember = true;

        if ($codeMember->exists()) {
            $updateCodeMember = $codeMember->update(['username' => request('username')]);
        }

        return ResponseApiHelper::customApiResponse($updateUserMember && $updateCodeMember, null, 'Update Authentication successfully.', 'Failed to update authentication.');
    }
}
