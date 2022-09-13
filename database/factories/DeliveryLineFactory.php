<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DeliveryLine>
 */
class DeliveryLineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'item' => fake()->text(10),
            'price' => fake()->randomFloat(2, 20, 50),
            'quantity' => fake()->randomFloat(2, 1, 100)
        ];
    }
}
