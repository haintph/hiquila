<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubCategoryFactory extends Factory
{
    protected $model = SubCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_sub' => $this->faker->word, // Tạo tên phụ mục
            'parent_id' => Category::inRandomOrder()->first()->id, // Lấy ngẫu nhiên một Category ID làm parent_id
            'img_subcate' => $this->faker->imageUrl(640, 480, 'business', true, 'sub_category'), // Tạo URL hình ảnh ngẫu nhiên
        ];
    }
}
