<?php

namespace App\Http\Controllers\Code\Guest;

use App\Helpers\ResponseApiHelper;
use App\Http\Controllers\Controller;
use App\Models\Code\Student\Transactions;
// use Midtrans\Midtrans;
// use Midtrans\Config;

class MidtransController extends Controller
{
    public function callback()
    {
        if (request('status_code') == '200') {
            if (request('transaction_status') == 'settlement') {
                $transaction = Transactions::where('order_id', request('order_id'));
                if ($transaction->exists()) {
                    $transaction->update([
                        'status' => request('transaction_status'),
                        'updated_at' => request('2024-01-11 23:10:07'),
                    ]);
                }

                // Config::$serverKey    = config('services.midtrans.serverKey');
                // Config::$isProduction = config('services.midtrans.isProduction');
                // Config::$isSanitized  = config('services.midtrans.isSanitized');
                // Config::$is3ds        = config('services.midtrans.is3ds');

                // $payoutData = [
                //     'amount' => request('gross_amount'),
                //     'bank_code' => 'BRI',
                //     'account_number' => $transaction->course->instructor->account_number,
                //     'account_holder_name' => $transaction->course->instructor->name,
                // ];

                // $midtrans = new Midtrans();
                // $payoutResponse = $midtrans->payoutCreate($payoutData);

                // if ($payoutResponse->status_code == 201) {
                //     return response()->json(['message' => 'Payout successful']);
                // } else {
                //     return response()->json(['error' => 'Payout failed'], 500);
                // }

                return ResponseApiHelper::customApiResponse(true, null, 'Data update success.');
            }
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false], 422);
        }
    }
}
