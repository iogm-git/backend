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
            'student_id' => 'student_one',
            'course_id' => 2,
            'amount' => 15000,
            'status' => 'PAID'
        ]);

        Transactions::create([
            'student_id' => 'student_two',
            'course_id' => 3,
            'amount' => 15000,
        ]);
    }
}
