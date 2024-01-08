<?php

namespace Database\Seeders\Code\Student;

use App\Models\Code\Student\CourseProgress;
use Illuminate\Database\Seeder;

class CourseProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        CourseProgress::create([
            'course_id' => 1,
            'student_id' => 'student_one',
            'completed_lectures' => 100
        ]);

        CourseProgress::create([
            'course_id' => 2,
            'student_id' => 'student_one'
        ]);
    }
}
