<?php 
namespace Database\Factories;

use App\Models\PromotionDish;
use App\Models\Promotion;
use App\Models\Dish;
use Illuminate\Database\Eloquent\Factories\Factory;

class PromotionDishFactory extends Factory
{
    protected $model = PromotionDish::class;

    public function definition()
    {
        return [
            'promotion_id' => Promotion::factory(),
            'dish_id' => Dish::factory(),
            'discount' => $this->faker->randomFloat(2, 1, 50),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
