<?php

namespace Database\Seeders\Code\Student;

use App\Models\Code\Student\Certificates;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
            'id' => Str::uuid(),
            'course_id' => 1,
            'student_id' => 'student_one',
        ]);
    }
}
