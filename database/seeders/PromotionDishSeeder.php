<?php 
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PromotionDish;

class PromotionDishSeeder extends Seeder
{
    public function run()
    {
        PromotionDish::factory()->count(10)->create();
    }
}