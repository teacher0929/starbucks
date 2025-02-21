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
        $createdAt = fake()->dateTimeBetween('-1 year', 'now');
        $product = Product::inRandomOrder()->first();

        return [
            'customer_id' => Customer::inRandomOrder()->first()->id,
            'product_id' => $product->id,
            'price' => $product->price,
            'note' => fake()->boolean(50)
                ? fake()->sentence(fake()->numberBetween(3, 5))
                : null,
            'payment_method' => fake()->numberBetween(0, 2),
            'payment_status' => fake()->numberBetween(0, 2),
            'status' => fake()->boolean(50)
                ? 1
                : fake()->numberBetween(0, 2),
            'created_at' => Carbon::parse($createdAt),
            'updated_at' => Carbon::parse($createdAt)->addDays(fake()->randomDigit()),
            'deleted_at' => fake()->boolean(5)
                ? Carbon::parse($createdAt)->addDays(fake()->randomDigit())
                : null,
        ];
    }
}
