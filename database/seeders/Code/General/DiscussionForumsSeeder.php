<?php

namespace Database\Seeders\Code\General;

use App\Models\Code\General\DiscussionForums;
use Illuminate\Database\Seeder;

class DiscussionForumsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DiscussionForums::create([
            'course_id' => 1,
            'user_id' => 'student_one',
            'message' => 'Hello...'
        ]);

        DiscussionForums::create([
            'course_id' => 1,
            'user_id' => 'instructor_one',
            'message' => 'Hai...'
        ]);

        DiscussionForums::create([
            'course_id' => 1,
            'user_id' => 'ilhamrhmtkbr',
            'message' => 'Welcome to my App'
        ]);
    }
}
