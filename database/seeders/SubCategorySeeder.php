<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all();

        if ($categories->isEmpty()) {
            $categories = Category::factory(5)->create();
        }

        foreach ($categories as $category) {
            SubCategory::factory(3)->create([
                'parent_id' => $category->id,
            ]);
        }
    }
}
