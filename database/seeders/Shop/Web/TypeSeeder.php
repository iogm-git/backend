<?php

namespace Database\Seeders\Shop\Web;

use App\Models\Shop\Web\Types;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $types = ['app_a', 'app_b', 'app_c', 'app_d', 'app_e'];

        foreach ($types as $value) {
            # code...
            Types::create([
                'name' => $value
            ]);
        }
    }
}
