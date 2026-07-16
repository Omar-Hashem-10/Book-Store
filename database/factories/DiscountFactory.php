<?php

namespace Database\Factories;

use App\Models\Discount;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Discount>
 */
class DiscountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->unique()->bothify('?????####'),
            'quantity' => $this->faker->numberBetween(1, 100),
            'percentage' => $this->faker->randomFloat(2, 1, 100),
            'expiry_date' => $this->faker->dateTimeBetween('+1 week', '+1 year'),
        ];
    }
}
