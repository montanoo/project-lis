<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_id' => Company::factory()->createOne()->id,
            'title' => fake()->title(),
            'price' => fake()->randomFloat(),
            'offer_price' => fake()->randomNumber(),
            'start_offer' => fake()->date(),
            'end_offer' => fake()->date(),
            'amount' => fake()->randomNumber(),
            'description' => fake()->text(10), 
            'active' => fake()->randomElement([true, false])
        ];
    }
}
