<?php

namespace Database\Factories\Code\Instructor\Studies;

use App\Models\Code\Instructor\Studies\Courses;
use Illuminate\Database\Eloquent\Factories\Factory;

class CoursesFactory extends Factory
{
    protected $model = Courses::class;

    public function definition()
    {
        return [
            'instructor_id' => 'ilhamrhmtkbr',
            'title' => $this->faker->unique()->sentence,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 10, 100),
        ];
    }
}
