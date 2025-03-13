<?php
namespace Database\Factories;

use App\Models\Dish;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SubCategory;

class DishFactory extends Factory
{
    protected $model = Dish::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 10, 200),
            'stock' => $this->faker->numberBetween(1, 50),
            'sub_category_id' => SubCategory::factory(), // Tạo SubCategory nếu chưa có
            'image' => $this->faker->imageUrl(),
            'is_available' => $this->faker->boolean(80),
            'is_new' => $this->faker->boolean(30),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
