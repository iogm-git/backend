<?php

namespace Database\Seeders\Code\Student;

use App\Models\Code\Student\Stash;
use Illuminate\Database\Seeder;

class StashSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Stash::create([
            'student_id' => 'student_one',
            'course_id' => 2,
        ]);

        Stash::create([
            'student_id' => 'student_two',
            'course_id' => 3,
        ]);
    }
}
