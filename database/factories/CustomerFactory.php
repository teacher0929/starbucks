<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Gift;
use App\Models\Notification;
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
        $createdAt = fake()->dateTimeBetween('-1 year', '-6 months');

        return [
            'invited_id' => (fake()->boolean(75) and Customer::count() > 0)
                ? Customer::inRandomOrder()->first()->id
                : null,
            'name' => fake()->firstName(),
            'surname' => fake()->lastName(),
            'username' => fake()->unique()->numberBetween(61000000, 65999999),
            'password' => bcrypt(str()->random()),
            'invitation_code' => str(str()->random(10))->upper(),
            'last_seen' => Carbon::parse($createdAt)->addDays(fake()->randomDigit()),
            'platform' => fake()->numberBetween(0, 2),
            'language' => fake()->numberBetween(0, 1),
            'created_at' => Carbon::parse($createdAt),
            'updated_at' => Carbon::parse($createdAt)->addDays(fake()->randomDigit()),
        ];
    }

    public function configure(): static
    {
        return $this->afterMaking(function (Customer $customer) {
            // ...
        })->afterCreating(function (Customer $customer) {
            if (isset($customer->invited_id)) {
                $invitedCustomer = Customer::findOrFail($customer->invited_id);
                $createdAt = Carbon::parse($customer->created_at)->addDays(fake()->randomDigit());
                $updatedAt = Carbon::parse($customer->created_at)->addDays(fake()->randomDigit());

                $obj = new Gift();
                $obj->customer_id = $invitedCustomer->id;
                $obj->starts_at = $createdAt;
                $obj->ends_at = $createdAt->addMonth();
                $obj->note = 'Invited ' . $customer->getName();
                $obj->status = fake()->numberBetween(0, 2);
                $obj->created_at = $createdAt;
                $obj->updated_at = $updatedAt;
                $obj->save();

                $obj = new Notification();
                $obj->customer_id = $invitedCustomer->id;
                $obj->title = 'You have won a free coffee';
                $obj->body = 'Dear Customer, thank you for inviting your friend!';
                $obj->created_at = $createdAt;
                $obj->save();

                $obj = new Gift();
                $obj->customer_id = $customer->id;
                $obj->starts_at = $createdAt;
                $obj->ends_at = $createdAt->addMonth();
                $obj->note = 'Invited by ' . $invitedCustomer->getName();
                $obj->status = fake()->numberBetween(0, 2);
                $obj->created_at = $createdAt;
                $obj->updated_at = $updatedAt;
                $obj->save();

                $obj = new Notification();
                $obj->customer_id = $customer->id;
                $obj->title = 'You have won a free coffee';
                $obj->body = 'Dear Customer, thank you for accepting your friend\'s invitation!';
                $obj->created_at = $createdAt;
                $obj->save();
            }
        });
    }
}
