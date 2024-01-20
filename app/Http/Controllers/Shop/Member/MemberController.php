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
            return ResponseApiHelper::customApiResponse(true, $this->findStash()->get());
        } else {
            return ResponseApiHelper::customApiResponse(true, null);
        }
    }

    public function storeStash()
    {
        if (!$this->findStash()->where('web_id', request('web_id'))->exists()) {
            $success = Stash::create([
                'web_id' => request('web_id'),
                'member_id' => request('id')
            ]);

            return ResponseApiHelper::customApiResponse($success, null, 'Web successfully added to stash.', 'Failed to add web to the stash.');
        } else {
            return ResponseApiHelper::customApiResponse(true, null, 'Stash has been added.');
        }
    }

    public function destroyStash()
    {
        $item = Stash::where('id', request('id'));

        if ($item->exists()) {
            $success = $item->delete();
            return ResponseApiHelper::customApiResponse($success, null, 'Web deleted successfully.', 'Web was not deleted successfully.');
        }
    }

    public function downloadWeb()
    {
        $transaction = Transactions::find(request('id'));
        if ($transaction && $transaction->status === 'PAID') {
            $web = $transaction->web;

            return response()->download(
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
