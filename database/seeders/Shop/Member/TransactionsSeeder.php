<?php

namespace Database\Seeders\Shop\Member;

use App\Models\Shop\Member\Transactions;
use Illuminate\Database\Seeder;

class TransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Transactions::create([
            'member_username' => 'ilhamrhmtkbr',
            'web_id' => 'w012',
            'amount' => 50000,
        ]);

        Transactions::create([
            'member_username' => 'ilhamrhmtkbr',
            'web_id' => 'w011',
            'amount' => 50000,
            'status' => 'PAID'
        ]);
    }
}
