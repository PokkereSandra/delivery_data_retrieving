<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Route>
 */
class RouteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'car_number' => fake()->numberBetween(7000, 7999),
            'driver_name' => fake()->name(),
            'status' => fake()->numberBetween(1, 3),
            'delivered_at' => fake()->date()
        ];
    }
}
