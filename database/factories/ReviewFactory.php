<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
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
            'customer_id' => Customer::inRandomOrder()->first()->id,
            'product_id' => Product::inRandomOrder()->first()->id,
            'rating' => fake()->numberBetween(1, 5),
            'comment' => fake()->sentence(fake()->numberBetween(3, 5)),
            'reply' => fake()->boolean(50)
                ? fake()->sentence(fake()->numberBetween(3, 5))
                : null,
            'status' => fake()->boolean(50)
                ? 1
                : fake()->numberBetween(0, 2),
            'created_at' => Carbon::parse($createdAt),
            'updated_at' => Carbon::parse($createdAt)->addDays(fake()->randomDigit(1)),
            'deleted_at' => fake()->boolean(5)
                ? Carbon::parse($createdAt)->addDays(fake()->randomDigit(2))
                : null,
        ];
    }
}
