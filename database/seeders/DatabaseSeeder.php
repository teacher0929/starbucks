<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Gift;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Variant;
use App\Models\Verification;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
        ]);

        Product::factory()
            ->count(100)
            ->has(Variant::factory()->count(3))
            ->create();

        Customer::factory()
            ->count(100)
            ->create();

        Gift::factory()
            ->count(50)
            ->create();

        Review::factory()
            ->count(100)
            ->create();

        Order::factory()
            ->count(100)
            ->create();

        Verification::factory()
            ->count(100)
            ->create();

        Notification::factory()
            ->count(100)
            ->create();
    }
}
