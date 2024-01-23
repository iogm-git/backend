<?php

namespace Database\Seeders\Shop\Member;

use App\Models\Shop\Member\Transactions;
use App\Models\User\Member;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = uniqid();
        Member::create([
            'id' => $id,
            'username' => 'juggernaut',
            'member_password' => Hash::make('juggernaut'),
            'name' => 'juggernaut',
            'email' => 'juggernaut@gmail.com',
            'verification_at' => now()
        ]);

        Transactions::create([
            'id' => uniqid('abc'),
            'member_id' => $id,
            'web_id' => 'w011',
            'amount' => 50000,
            'status' => 'paid'
        ]);
    }
}
