<?php

namespace Database\Factories;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
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
            'invited_id' => (fake()->boolean(50) and Customer::count() > 0)
                ? Customer::inRandomOrder()->first()->id
                : null,
            'name' => fake()->firstName(),
            'surname' => fake()->lastName(),
            'invitation_code' => str(str()->random(10))->upper(),
            'username' => fake()->unique()->numberBetween(61000000, 65999999),
            'password' => bcrypt(fake()->randomDigit(5)),
            'last_seen' => Carbon::parse($createdAt)->addDays(fake()->randomDigit(2)),
            'platform' => fake()->numberBetween(0, 2),
            'language' => fake()->numberBetween(0, 2),
            'created_at' => Carbon::parse($createdAt),
            'updated_at' => Carbon::parse($createdAt)->addDays(fake()->randomDigit(1)),
        ];
    }
}
