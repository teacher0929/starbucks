<?php

namespace Database\Factories;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Verification>
 */
class VerificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $createdAt = fake()->dateTimeBetween('- 1 year', 'now');

        return [
            'phone' => fake()->unique()->numberBetween(61000000, 65999999),
            'code' => fake()->randomDigit(5),
            'status' => fake()->numberBetween(0, 2),
            'created_at' => Carbon::parse($createdAt),
            'updated_at' => Carbon::parse($createdAt)->addSeconds(fake()->randomDigit(2)),
        ];
    }
}
