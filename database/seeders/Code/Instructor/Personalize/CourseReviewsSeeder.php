<?php

namespace Database\Seeders\Code\Instructor\Personalize;

use App\Models\Code\Instructor\Personalize\CourseReviews;
use Illuminate\Database\Seeder;

class CourseReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        CourseReviews::create([
            'course_id' => 1,
            'student_id' => 'student_one',
            'review' => 'review_one',
            'rating' => 10
        ]);

        CourseReviews::create([
            'course_id' => 2,
            'student_id' => 'student_one',
            'review' => 'review_one',
            'rating' => 10
        ]);
    }
}
