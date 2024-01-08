<?php

namespace Database\Seeders\Shop\Web;

use App\Models\Shop\Web\Categories;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = ['blog', 'building', 'car', 'cloth', 'coffe', 'course', 'food', 'headphone', 'phone', 'portfolio', 'sport'];

        foreach ($categories as $value) {
            Categories::create([
                'name' => $value
            ]);
        }
    }
}
