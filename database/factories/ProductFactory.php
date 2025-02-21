<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $createdAt = fake()->dateTimeBetween('-1 year', 'now');

        return [
            'category_id' => Category::whereNotNull('parent_id')->inRandomOrder()->first()->id,
            'name' => fake()->word(),
            'name_ru' => fake()->sentence(fake()->numberBetween(2, 3)) . ' (RU)',
            'slug' => str()->random(10),
            'description' => fake()->paragraph(fake()->numberBetween(2, 3)),
            'description_ru' => fake()->paragraph(fake()->numberBetween(2, 3)) . ' (RU)',
            'status' => fake()->boolean(95),
            'created_at' => Carbon::parse($createdAt),
            'updated_at' => Carbon::parse($createdAt)->addDays(fake()->randomDigit()),
        ];
    }

    public function configure(): static
    {
        return $this->afterMaking(function (Product $product) {
            // ...
        })->afterCreating(function (Product $product) {
            $product->slug = str($product->name)->slug() . '-' . $product->id;
            $product->update();

            $product->favorites()->sync(Customer::inRandomOrder()
                ->take(fake()->numberBetween(2, 3))
                ->get());
        });
    }
}
