<?php

namespace Database\Factories;

use App\Models\Category;
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
        $createdAt = fake()->dateTimeBetween('- 1 year', 'now');

        return [
            'category_id' => Category::whereNotNull('parent_id')->inRandomOrder()->first()->id,
            'name' => fake()->sentence(rand(3, 5)),
            'name_ru' => fake()->sentence(rand(3, 5)) . ' (RU)',
            'description' => fake()->paragraph(rand(3, 5)),
            'description_ru' => fake()->paragraph(rand(3, 5)) . ' (RU)',
            'status' => fake()->boolean(90),
            'created_at' => Carbon::parse($createdAt),
            'updated_at' => Carbon::parse($createdAt)->addDays(fake()->randomDigit(2)),
        ];
    }
}
