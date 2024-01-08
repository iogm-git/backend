<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\Member;
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
        //
        Member::create([
            'id' => Str::uuid(),
            'username' => 'ilhamrhmtkbr',
            'member_password' => Hash::make('ilham25'),
            'name' => 'Ilham R.A',
        ]);
    }
}
