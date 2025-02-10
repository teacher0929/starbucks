<?php

namespace Database\Factories;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gift>
 */
class GiftFactory extends Factory
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
            'from_customer_id' => Customer::inRandomOrder()->first()->id,
            'to_customer_id' => Customer::inRandomOrder()->first()->id,
            'starts_at' => Carbon::parse($createdAt),
            'ends_at' => Carbon::parse($createdAt)->addMonth(),
            'status' => fake()->boolean(50)
                ? 1
                : fake()->numberBetween(0, 2),
            'created_at' => Carbon::parse($createdAt),
            'updated_at' => Carbon::parse($createdAt)->addDays(fake()->randomDigit(1)),
        ];
    }
}
