<?php

namespace Database\Factories\Code\Instructor\Studies;

use App\Models\Code\Instructor\Studies\Lessons;
use App\Models\Code\Instructor\Studies\Sections;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonsFactory extends Factory
{
    protected $model = Lessons::class;

    private static $orderInSectionCounter = 1;
    private static $currentSectionIndex = 0;
    private static $sectionIds;

    public function definition()
    {
        // If course IDs are not set, initialize them
        if (empty(self::$sectionIds)) {
            self::$sectionIds = Sections::pluck('id')->toArray();
        }

        // Get the current course ID
        $sectionId = self::$sectionIds[self::$currentSectionIndex];

        // Increment the counter and update the current course index
        self::$currentSectionIndex = (++self::$currentSectionIndex) % count(self::$sectionIds);

        return [
            'section_id' => $sectionId,
            'title' => $this->faker->sentence,
            'code' => $this->faker->optional()->text,
            'order_in_section' => self::$orderInSectionCounter++,
        ];
    }
}
