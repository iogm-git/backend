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

    public function member()
    {
        if ($this->transaction()->exists()) {
            return ResponseApiHelper::customApiResponse(true, $this->transaction()->get(), 'Data retrieved successfully.');
        } else {
            return ResponseApiHelper::customApiResponse(false, null, null, 'Data was not successfully retrieved.');
        }
    }

    public function purchase()
    {
        if (!$this->transaction()->where('web_id', '=', request('web'))->exists()) {
            $success = Transactions::create([
                'member_username' => request('username'),
                'web_id' => request('web'),
                'amount' => request('amount'),
            ]);

            return ResponseApiHelper::customApiResponse($success, null, 'Data successfully added to the database.', 'Failed to add data to the database.');
        } else {
            return ResponseApiHelper::customApiResponse(false, null, null, 'Data was not successfully retrieved.');
        }
    }

    public function history()
    {
        // return response()->json(['data' => $this->transaction()->where('status', '=', 'PAID')->get() ?? null], 200);
        if ($this->transaction()->where('status', '=', 'PAID')->exists()) {
            return ResponseApiHelper::customApiResponse(true, $this->transaction()->where('status', '=', 'PAID')->get(), 'Data retrieved successfully.');
        } else {
            return ResponseApiHelper::customApiResponse(false, null, null, 'Data was not successfully retrieved.');
        }
    }

    public function latest()
    {
        // return response()->json(['data' => $this->transaction()->where('status', '=', 'UNPAID')->latest()->first() ?? null], 200);

        if ($this->transaction()->where('status', '=', 'UNPAID')->latest()->exists()) {
            return ResponseApiHelper::customApiResponse(true, $this->transaction()->where('status', '=', 'UNPAID')->latest()->first(), 'Data retrieved successfully.');
        } else {
            return ResponseApiHelper::customApiResponse(false, null, null, 'Data was not successfully retrieved.');
        }
    }
}
