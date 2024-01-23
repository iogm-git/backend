<?php

namespace App\Http\Controllers\Shop\Member;

use App\Helpers\ResponseApiHelper;
use App\Http\Controllers\Controller;
use App\Models\Shop\Member\Transactions;
use App\Models\Shop\Web\Details;
use Midtrans\Config;

class MidtransController extends Controller
{
    public function store()
    {
        $transaction = Transactions::where('member_id', request('id'))->where('web_id', request('web_id'));
        if ($transaction->exists()) {
            if ($transaction->first()->status == 'pending') {
                return ResponseApiHelper::customApiResponse(true, null, 'You have purchased this web, please pay.');
            } else {
                return ResponseApiHelper::customApiResponse(true, null, 'You have purchased this web.');
            }
        } else {
            $web = Details::where('id', request('web_id'));
            $webPrice = intval($web->value('price'));

            // Set Midtrans API credentials
            Config::$serverKey    = config('services.midtrans.serverKey');
            Config::$isProduction = config('services.midtrans.isProduction');
            Config::$isSanitized  = config('services.midtrans.isSanitized');
            Config::$is3ds        = config('services.midtrans.is3ds');

            $orderId = uniqid();
            // Set up the transaction details
            $transaction_details = [
                'order_id' => $orderId,
                'gross_amount' => $webPrice,
            ];

            try {
                // Create the Snap URL for the payment page
                $middtrans = \Midtrans\Snap::createTransaction(compact('transaction_details'));
                $middtrans->order_id = $orderId;

                $success = Transactions::create([
                    'id' => $orderId,
                    'member_id' => request('id'),
                    'web_id' => request('web_id'),
                    'amount' => $webPrice,
                    'midtrans_data' => json_encode($middtrans, JSON_UNESCAPED_SLASHES)
                ]);

                return ResponseApiHelper::customApiResponse($success, null, 'Transaction was created successfully.', 'Failed transaction was created successfully.');
            } catch (\Exception $e) {
                return ResponseApiHelper::customApiResponse(false, null, null, $e->getMessage());
            }
        }
    }
}
