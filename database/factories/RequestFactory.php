<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Request>
 */
class RequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'body' => fake()->realText(255),
            'applicant_id' => fake()->numberBetween(1, 3),
            'approver_id' => fake()->numberBetween(4, 10),
            'is_completed' => fake()->randomNumber() % 2 == 0,
        ];
    }
}
