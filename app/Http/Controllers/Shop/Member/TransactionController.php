<?php

namespace App\Http\Controllers\Shop\Member;

use App\Helpers\ResponseApiHelper;
use App\Http\Controllers\Controller;
use App\Models\Shop\Member\Transactions;

class TransactionController extends Controller
{
    //
    public function transaction()
    {
        return Transactions::where('member_username', '=', request('username'));
    }

    public function information()
    {
        $data = $this->transaction()->get();
        return ResponseApiHelper::customApiResponse(true, $data);
    }

    public function havePaid()
    {
        $data = $this->transaction()->where('status', '=', 'PAID')->get();
        return ResponseApiHelper::customApiResponse(true, $data);
    }

    public function latestUnpaid()
    {
        $data = $this->transaction()->where('status', '=', 'UNPAID')->latest()->first();
        return ResponseApiHelper::customApiResponse(true, $data);
    }

    public function purchase()
    {
        if (!$this->transaction()->where('web_id', '=', request('web_id'))->exists()) {
            $success = Transactions::create([
                'member_username' => request('username'),
                'web_id' => request('web_id'),
                'amount' => request('amount'),
            ]);

            return ResponseApiHelper::customApiResponse($success, null, 'Successfully added website to purchase list.');
        } else {
            return ResponseApiHelper::customApiResponse(true, null, 'You have purchased this website.');
        }
    }
}
