<?php

namespace Database\Factories;

use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubCategoryFactory extends Factory
{
    protected $model = SubCategory::class;

    public function definition(): array
    {
        return [
            'name_sub' => $this->faker->word(),
            'parent_id' => Category::factory(),
            'img_subcate' => $this->faker->imageUrl(200, 200, 'cats', true, 'sub-category'),
        ];
    }
}
