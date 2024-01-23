<?php

namespace App\Http\Controllers\Shop\Member;

use App\Helpers\ResponseApiHelper;
use App\Http\Controllers\Controller;
use App\Models\Shop\Member\Transactions;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    //
    public function transaction()
    {
        return Transactions::where('member_id', '=', request('id'));
    }

    public function information()
    {
        $data = DB::connection(env('DB_CONNECTION'))->select("
        SELECT web_id as id, 
        (SELECT name FROM web_types WHERE id=(SELECT type FROM web_details WHERE id=member_transactions.web_id)) as type, 
        (SELECT name FROM web_categories WHERE id=(SELECT category FROM web_details WHERE id=member_transactions.web_id)) as category, 
        DATE_FORMAT(date, '%d %b %Y') as date, 
        REPLACE(FORMAT(amount, 0), ',', '.') as amount, 
        status, 
        json_extract(midtrans_data, '$.token') as token, 
        json_extract(midtrans_data, '$.order_id') as order_id, 
        (SELECT name FROM member_data WHERE id=member_transactions.member_id) as customer_name, 
        (SELECT email FROM member_data WHERE id=member_transactions.member_id) as customer_email
        FROM member_transactions WHERE member_id = \"" . request('id') . "\";
    ");

        return ResponseApiHelper::customApiResponse(true, $data);
    }

    public function havePaid()
    {
        $data = $this->transaction()->where('status', '=', 'paid')->get();
        return ResponseApiHelper::customApiResponse(true, $data);
    }

    public function latestUnpaid()
    {
        $data = $this->transaction()->where('status', '=', 'unpaid')->latest()->first();
        return ResponseApiHelper::customApiResponse(true, $data);
    }

    // Kalo tripay sudah aktif lagi
    // public function purchase()
    // {
    //     if (!$this->transaction()->where('web_id', '=', request('web_id'))->exists()) {
    //         $success = Transactions::create([
    //             'member_username' => request('username'),
    //             'web_id' => request('web_id'),
    //             'amount' => request('amount'),
    //         ]);

    //         return ResponseApiHelper::customApiResponse($success, null, 'Successfully added website to purchase list.');
    //     } else {
    //         return ResponseApiHelper::customApiResponse(true, null, 'You have purchased this website.');
    //     }
    // }
}
