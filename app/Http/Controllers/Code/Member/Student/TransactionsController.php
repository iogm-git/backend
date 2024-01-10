<?php

namespace App\Http\Controllers\Code\Member\Student;

use App\Helpers\ResponseApiHelper;
use App\Http\Controllers\Controller;
use App\Models\Code\Student\Transactions;
use App\Models\Shop\Member\Transactions as MemberTransactions;

class TransactionsController extends Controller
{
    public function store()
    {
        $transaction = Transactions::where('course_id', request('course_id'))->where('student_id', request('student_id'));
        if ($transaction->exists()) {
            if ($transaction->first()->status == 'UNPAID') {
                return ResponseApiHelper::customApiResponse(false, null, null, 'You have purchased this course, please pay.');
            } else {
                return ResponseApiHelper::customApiResponse(false, null, null, 'You have purchased this course.');
            }
        } else {
            MemberTransactions::create([
                'student_id' => request('student_id'),
                'course_id' => request('course_id'),
                'amount' => request('amount')
            ]);
        }
    }
}
