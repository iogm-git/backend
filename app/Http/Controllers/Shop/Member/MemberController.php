<?php

namespace App\Http\Controllers\Shop\Member;

use App\Helpers\ResponseApiHelper;
use App\Http\Controllers\Controller;
use App\Mail\Otp;
use App\Models\Member;
use App\Models\Shop\Member\Stash;
use App\Models\Shop\Member\Transactions;
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

    public function findStash()
    {
        return Stash::where('member_id', request('id'));
    }

    public function getStash()
    {
        if ($this->findStash()->exists()) {
            return ResponseApiHelper::customApiResponse(true, $this->findStash()->get(), 'Data retrieved successfully.');
        } else {
            return ResponseApiHelper::customApiResponse(false, null, null, 'Data was not successfully retrieved.');
        }
    }

    public function storeStash()
    {
        if (!Stash::where('web_id', request('web_id'))->where('member_id', request('member_id'))->exists()) {
            $success = Stash::create([
                'web_id' => request('web_id'),
                'member_id' => request('member_id')
            ]);

            return ResponseApiHelper::customApiResponse($success, null, 'Data successfully added to the database.', 'Failed to add data to the database.');
        } else {
            return ResponseApiHelper::customApiResponse(false, null, null, 'Stash has been added.');
        }
    }

    public function destroyStash()
    {
        $item = Stash::where('id', request('id'));

        if ($item->exists()) {
            $item->delete();
            return ResponseApiHelper::customApiResponse(true, null, 'Data deleted successfully.');
        } else {
            return ResponseApiHelper::customApiResponse(false, null, null, 'Data was not deleted successfully.');
        }
    }

    public function downloadWeb()
    {
        $transaction = Transactions::find(request('id'));
        if ($transaction->where('status', '=', 'PAID')->exists()) {
            $web = $transaction->first()->web;
            return response()
                ->download(
                    storage_path('/app/public/download/' .
                        $web->web_category->name . '-' .
                        $web->web_type->name . '.zip')
                );
        } else {
            return ResponseApiHelper::customApiResponse(false, null, null, 'File failed to download.');
        }
    }

    public function downloadTransactions()
    {
        $pdf = app('dompdf.wrapper');

        $pdf->loadView('shop.layouts.pdf.history-transactions', ['transactions' => Transactions::where('member_username', request('username'))->get()]);

        return $pdf->download('history-transactions.pdf');
    }

    public function uploadProfileImage()
    {
        $image = 'profile.svg';
        $oldImage = $this->findMember()->first()->image;

        if (request('image') == 'profile.svg') {
            $success = Storage::delete('public/images/' . $oldImage);
            if (!$success) {
                return ResponseApiHelper::customApiResponse(false, null, null, 'File failed to delete.');
            }
        } else {
            if ($oldImage != 'profile.svg' && !str_contains('https://', $oldImage)) {
                $success = Storage::delete('public/images/' . $oldImage);
                if (!$success) {
                    return ResponseApiHelper::customApiResponse(false, null, null, 'File failed to delete.');
                }
            }
            $image = Str::uuid() . '.png';
            $success = Storage::disk('local')->put('public/images/' . $image, base64_decode(request('image')));
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
        $oldUsername = $this->findMember()->first()->username;
        if ($oldUsername != request('username')) {
            $validator = Validator::make(request()->all(), [
                'username' => 'required|unique:member_data,username|min:4',
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
