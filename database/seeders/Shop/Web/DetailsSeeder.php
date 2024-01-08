<?php

namespace Database\Seeders\Shop\Web;

use App\Models\Shop\Web\Details;
use Illuminate\Database\Seeder;

class DetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $details = [
            ['w011', 1, 1, 50000],
            ['w012', 1, 2, 50000],
            ['w013', 1, 3, 60000],
            ['w021', 2, 1, 50000],
            ['w031', 3, 1, 50000],
            ['w041', 4, 1, 50000],
            ['w042', 4, 2, 50000],
            ['w043', 4, 3, 50000],
            ['w051', 5, 1, 50000],
            ['w061', 6, 1, 50000],
            ['w071', 7, 1, 50000],
            ['w081', 8, 1, 50000],
            ['w091', 9, 1, 50000],
            ['w092', 9, 2, 50000],
            ['w101', 10, 1, 50000],
            ['w102', 10, 2, 50000],
            ['w103', 10, 3, 50000],
            ['w104', 10, 4, 50000],
            ['w105', 10, 5, 50000],
            ['w111', 11, 1, 60000],
        ];

        foreach ($details as $value) {
            # code...
            Details::create([
                'id' => $value[0],
                'category' => $value[1],
                'type' => $value[2],
                'price' => $value[3]
            ]);
        }
    }
}
