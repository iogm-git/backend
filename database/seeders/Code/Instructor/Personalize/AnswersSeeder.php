<?php

namespace Database\Seeders\Code\Instructor\Personalize;

use App\Models\Code\Instructor\Personalize\Answers;
use Illuminate\Database\Seeder;

class AnswersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Answers::create([
            'question_id' => 1,
            'instructor_id' => 'ilhamrhmtkbr',
            'answer' => 'answer_one'
        ]);

        Answers::create([
            'question_id' => 2,
            'instructor_id' => 'ilhamrhmtkbr',
            'answer' => 'answer_one'
        ]);
    }
}
