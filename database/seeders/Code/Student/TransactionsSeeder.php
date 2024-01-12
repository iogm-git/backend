<?php

namespace Database\Seeders\Code\Student;

use App\Models\Code\Student\Transactions;
use Carbon\Carbon;
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
            'order_id' => uniqid(),
            'student_id' => 'student_one',
            'course_id' => 1,
            'amount' => 15000,
            'status' => 'settlement'
        ]);
    }
}
