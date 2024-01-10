<?php

namespace Database\Seeders\Code;

use App\Models\Code\General\Member;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Member::create([
            'username' => 'student_one',
            'name' => 'student One',
            'role' => 'student'
        ]);

        Member::create([
            'username' => 'student_two',
            'name' => 'student Two',
            'role' => 'student'
        ]);

        Member::create([
            'username' => 'instructor_one',
            'name' => 'instructor One',
            'role' => 'instructor'
        ]);

        Member::create([
            'username' => 'instructor_two',
            'name' => 'instructor Two',
            'role' => 'instructor'
        ]);

        Member::create([
            'username' => 'ilhamrhmtkbr',
            'name' => 'Ilham R.A',
            'role' => 'instructor'
        ]);
    }
}
