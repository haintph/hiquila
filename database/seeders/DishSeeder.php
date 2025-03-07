<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dish;

class DishSeeder extends Seeder
{
    public function run()
    {
        Dish::factory()->count(20)->create(); // Tạo 20 món ăn giả lập
    }
}
