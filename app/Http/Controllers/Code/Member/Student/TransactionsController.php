<?php

namespace App\Http\Controllers\Code\Member\Student;

use App\Helpers\ResponseApiHelper;
use App\Http\Controllers\Controller;
use App\Models\Code\General\Member;
use App\Models\Code\Instructor\Studies\Courses;
use App\Models\Code\Student\Transactions;
use App\Models\User\Member as CoreMember;
use Midtrans\Config;

class TransactionsController extends Controller
{
    public function store()
    {
        $transaction = Transactions::where('course_id', request('course_id'))->where('student_id', request('student_id'));
        if ($transaction->exists()) {
            if ($transaction->first()->status == 'unpaid') {
                return ResponseApiHelper::customApiResponse(false, null, null, 'You have purchased this course, please pay.');
            } else {
                return ResponseApiHelper::customApiResponse(false, null, null, 'You have purchased this course.');
            }
        } else {
            $member = CoreMember::where('username', request('student_id'))->first();

            $course = Courses::where('id', request('course_id'));
            $coursePrice = intval($course->value('price'));

            $customer = Member::where('username', request('student_id'))->first();

            // Set Midtrans API credentials
            Config::$serverKey    = config('services.midtrans.serverKey');
            Config::$isProduction = config('services.midtrans.isProduction');
            Config::$isSanitized  = config('services.midtrans.isSanitized');
            Config::$is3ds        = config('services.midtrans.is3ds');

            // Calculate the amount to be paid to the instructor and your application
            // $instructorAmount = $coursePrice; // Example: Amount to be paid to the instructor
            // $applicationAmount = $instructorAmount * 10 / 100; // Example: Amount to be kept by your application

            $orderId = uniqid();
            // Set up the transaction details
            $transaction_details = [
                'order_id' => $orderId,
                'gross_amount' => $coursePrice,
            ];

            $customer_details = [
                'first_name' => $member->name,
                'email' => $member->email
            ];

            try {
                // Create the Snap URL for the payment page
                $middtrans = \Midtrans\Snap::createTransaction(compact('transaction_details', 'customer_details'));

                $success = Transactions::create([
                    'order_id' => $orderId,
                    'student_id' => request('student_id'),
                    'course_id' => request('course_id'),
                    'midtrans_data' => $middtrans,
                    'amount' => $coursePrice
                ]);

                return ResponseApiHelper::customApiResponse($success, null, 'Data added to database successfully.', 'Data failed to add to the database.');
            } catch (\Exception $e) {
                return ResponseApiHelper::customApiResponse(false, null, null, $e->getMessage());
            }
        }
    }
}
