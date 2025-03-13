<?php

namespace Database\Factories;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class SubCategoryFactory extends Factory
{
    protected $model = SubCategory::class;

    public function definition()
    {
        return [
            'name_sub' => $this->faker->word(),
            'parent_id' => Category::inRandomOrder()->first()?->id ?? Category::factory(),
            'img_subcate' => $this->faker->imageUrl(),
            'is_active' => $this->faker->boolean(90), // 90% là active
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
