<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $createdAt = fake()->dateTimeBetween('- 1 year', 'now');
        $product = Product::inRandomOrder()->first();

        return [
            'customer_id' => Customer::inRandomOrder()->first()->id,
            'product_id' => $product->id,
            'price' => $product->price,
            'note' => fake()->sentence(rand(3, 9)),
            'payment_method' => fake()->numberBetween(0, 2),
            'payment_status' => fake()->numberBetween(0, 2),
            'status' => fake()->numberBetween(0, 2),
            'created_at' => Carbon::parse($createdAt),
            'updated_at' => Carbon::parse($createdAt)->addDays(fake()->randomDigit(1)),
            'deleted_at' => fake()->boolean(10)
                ? Carbon::parse($createdAt)->addDays(fake()->randomDigit(2))
                : null,
        ];
    }
}
