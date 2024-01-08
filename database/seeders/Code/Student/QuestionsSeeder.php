<?php

namespace Database\Seeders\Code\Student;

use App\Models\Code\Student\Questions;
use Illuminate\Database\Seeder;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Questions::create([
            'course_id' => 1,
            'student_id' => 'student_one',
            'question' => 'question_one'
        ]);

        Questions::create([
            'course_id' => 2,
            'student_id' => 'student_one',
            'question' => 'question_two'
        ]);
    }
}
