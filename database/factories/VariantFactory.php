<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Variant>
 */
class VariantFactory extends Factory
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
            'name' => fake()->sentence(rand(3, 5)),
            'name_ru' => fake()->sentence(rand(3, 5)) . ' (RU)',
            'price' => fake()->randomDigit(2),
            'created_at' => Carbon::parse($createdAt),
            'updated_at' => Carbon::parse($createdAt)->addDays(fake()->randomDigit(2)),
        ];
    }
}
