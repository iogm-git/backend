<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseApiHelper;
use App\Models\Shop\Member\Transactions;
use Illuminate\Support\Facades\Validator;

class CallbackTransactionsController extends Controller
{
    public function callbackTransactions()
    {
        $validator = Validator::make(request()->all(), [
            'order_id' => 'required',
            'status_code' => 'required',
            'gross_amount' => 'required'
        ]);

        if ($validator->fails()) {
            return ResponseApiHelper::customApiResponse(false, null, null, $validator->errors());
        }

        $serverKey = env('MIDTRANS_SERVER_KEY');
        $hashed = hash("sha512", request('order_id') . request('status_code') . request('gross_amount') . $serverKey);
        if ($hashed == request('signature_key')) {
            if (request('transaction_status') == 'settlement') {
                $success = Transactions::find(request('order_id'))->update(['status' => 'paid']);
                return ResponseApiHelper::customApiResponse($success, null, 'oke');
            }
        } else {
            return ResponseApiHelper::customApiResponse(false, null, null, 'hah');
        }
    }
}
