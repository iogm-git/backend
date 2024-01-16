<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\User\Member;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for shop and code
        Member::create([
            'id' => Str::uuid(),
            'username' => 'ilhamrhmtkbr',
            'member_password' => Hash::make('ilham25'),
            'name' => 'Ilham R.A',
        ]);
        // for shop and code

        // for iogm code
        Member::create([
            'id' => Str::uuid(),
            'username' => 'student_one',
            'member_password' => Hash::make('student_one'),
            'name' => 'student_one',
        ]);

        Member::create([
            'id' => Str::uuid(),
            'username' => 'student_two',
            'member_password' => Hash::make('student_two'),
            'name' => 'student_two',
        ]);

        Member::create([
            'id' => Str::uuid(),
            'username' => 'instructor_one',
            'member_password' => Hash::make('instructor_one'),
            'name' => 'instructor_one',
        ]);

        Member::create([
            'id' => Str::uuid(),
            'username' => 'instructor_two',
            'member_password' => Hash::make('instructor_two'),
            'name' => 'instructor_two',
        ]);
        // for iogm code
    }
}
