<?php

namespace Database\Factories;

use App\Models\Dish;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class DishFactory extends Factory
{
    protected $model = Dish::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3), // Tên món ăn ngẫu nhiên
            'description' => $this->faker->paragraph(), // Mô tả ngẫu nhiên
            'price' => $this->faker->randomFloat(2, 10, 200), // Giá từ 10 - 200
            'stock' => $this->faker->numberBetween(0, 100), // Số lượng từ 0-100
            'sub_category_id' => SubCategory::inRandomOrder()->first()->id ?? 1, // Chọn danh mục con ngẫu nhiên
            'image' => 'dishes/default.png', // Ảnh mặc định
            'is_available' => $this->faker->boolean(80), // 80% có sẵn
        ];
    }
}
