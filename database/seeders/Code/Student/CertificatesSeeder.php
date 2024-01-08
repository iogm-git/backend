<?php

namespace Database\Seeders\Code\Student;

use App\Models\Code\Student\Certificates;
use Illuminate\Database\Seeder;

class CertificatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Certificates::create([
            'course_id' => 1,
            'student_id' => 'student_one'
        ]);
    }
}
