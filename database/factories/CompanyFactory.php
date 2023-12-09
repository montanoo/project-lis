<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'nit' => fake()->uuid(),
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'user_id' => User::factory()->createOne()->id,
            'active' => fake()->randomElement([true, false]),
            'tax' => fake()->numberBetween(0, 1)
        ];
    }
}
