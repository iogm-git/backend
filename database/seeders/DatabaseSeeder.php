<?php

namespace Database\Seeders;

use App\Models\Code\Instructor\Studies\Courses;
use App\Models\Code\Instructor\Studies\Lessons;
use App\Models\Code\Instructor\Studies\Sections;
use Database\Seeders\Code\General\DiscussionForumsSeeder;
use Illuminate\Database\Seeder;

use Database\Seeders\Code\Student\StashSeeder;
use Database\Seeders\Code\Student\QuestionsSeeder;
use Database\Seeders\Code\Student\TransactionsSeeder as StudentTransactionsSeeder;
use Database\Seeders\Code\Instructor\Personalize\AnswersSeeder;
use Database\Seeders\Code\Instructor\Personalize\CourseReviewsSeeder;
use Database\Seeders\Code\Instructor\Personalize\EarningsSeeder;
// use Database\Seeders\Code\Instructor\Studies\CoursesSeeder;
// use Database\Seeders\Code\Instructor\Studies\Lessons1Seeder;
// use Database\Seeders\Code\Instructor\Studies\Lessons2Seeder;
// use Database\Seeders\Code\Instructor\Studies\Lessons3Seeder;
// use Database\Seeders\Code\Instructor\Studies\SectionsSeeder;
use Database\Seeders\Code\MemberSeeder as CodeMemberSeeder;
use Database\Seeders\Code\Student\CertificatesSeeder;
use Database\Seeders\Code\Student\CourseProgressSeeder;
use Database\Seeders\MemberSeeder;

use Database\Seeders\Shop\Member\TransactionsSeeder;
use Database\Seeders\Shop\Web\CategoriesSeeder;
use Database\Seeders\Shop\Web\DetailsSeeder;
use Database\Seeders\Shop\Web\TypeSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {

        $this->call(
            [
                // ===== shop =====
                MemberSeeder::class,
                CategoriesSeeder::class,
                TypeSeeder::class,
                DetailsSeeder::class,
                TransactionsSeeder::class,
                // ===== shop =====

                // ===== code =====
                // - member data
                CodeMemberSeeder::class,
                // - member data
            ]
        );
        Courses::factory(11)->create();

        $this->call(
            [ // - instructor
                // CoursesSeeder::class,
                CourseReviewsSeeder::class,
                EarningsSeeder::class,
            ]
        );

        Sections::factory(17)->create();
        Lessons::factory(27)->create();

        $this->call(
            [
                // SectionsSeeder::class,
                // Lessons1Seeder::class,
                // Lessons2Seeder::class,
                // Lessons3Seeder::class,
                // - instructor

                // - student
                QuestionsSeeder::class,
                // - student

                // - instructor
                AnswersSeeder::class,
                // - instructor

                // - student
                StashSeeder::class,
                StudentTransactionsSeeder::class,
                QuestionsSeeder::class,
                CourseProgressSeeder::class,
                CertificatesSeeder::class,
                // - student

                // - general
                DiscussionForumsSeeder::class
                // - general
                // ===== code =====
            ]
        );
    }
}
