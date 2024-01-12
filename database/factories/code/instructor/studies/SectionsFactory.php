<?php

namespace Database\Factories\Code\Instructor\Studies;

use App\Models\Code\Instructor\Studies\Sections;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Code\Instructor\Studies\Courses;

class SectionsFactory extends Factory
{
    protected $model = Sections::class;

    private static $orderInCourseCounter = 1;
    private static $currentCourseIndex = 0;
    private static $courseIds;

    public function definition()
    {
        // $courseId = Courses::pluck('id')->random();

        // If course IDs are not set, initialize them
        if (empty(self::$courseIds)) {
            self::$courseIds = Courses::pluck('id')->toArray();
        }

        // Get the current course ID
        $courseId = self::$courseIds[self::$currentCourseIndex];

        // Increment the counter and update the current course index
        self::$currentCourseIndex = (++self::$currentCourseIndex) % count(self::$courseIds);

        return [
            'course_id' => $courseId,
            'title' => $this->faker->sentence,
            'order_in_course' => self::$orderInCourseCounter++,
        ];
    }
}
