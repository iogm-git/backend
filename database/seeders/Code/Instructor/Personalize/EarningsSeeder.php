<?php

namespace Database\Seeders\Code\Instructor\Personalize;

use App\Models\Code\Instructor\Personalize\Earnings;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EarningsSeeder extends Seeder
{
    public function run()
    {
        //
        Earnings::create([
            'course_id' => 1,
            'student_id' => 'student_one',
            'recorded_at' => Carbon::now(),
            'amount' => 15000,
        ]);

        Earnings::create([
            'course_id' => 2,
            'student_id' => 'student_one',
            'recorded_at' => Carbon::now(),
            'amount' => 15000,
            'status' => 'PAID'
        ]);
    }
}
