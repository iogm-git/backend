<?php

namespace App\Http\Controllers\Shop\Member;

use App\Helpers\ResponseApiHelper;
use App\Http\Controllers\Controller;
use App\Models\Shop\Member\Stash;
use App\Models\Shop\Member\Transactions;


class MemberController extends Controller
{
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
}
