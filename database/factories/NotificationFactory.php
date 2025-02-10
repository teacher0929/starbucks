<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notification>
 */
class NotificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => Customer::inRandomOrder()->first()->id,
            'title' => fake()->sentence(rand(3, 5)),
            'body' => fake()->paragraph(rand(3, 5)),
            'created_at' => fake()->dateTimeBetween('- 1 year', 'now'),
        ];
    }
}
