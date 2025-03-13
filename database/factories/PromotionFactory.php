<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Promotion;

class PromotionFactory extends Factory
{
    protected $model = Promotion::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'discount_type' => $this->faker->randomElement(['fixed', 'percent', 'freeship']),
            'discount_value' => $this->faker->randomFloat(2, 5, 50),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'status' => $this->faker->boolean(),
        ];
    }
}
