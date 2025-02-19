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

        User::factory()
            ->create([
                'username' => 'admin',
            ]);

        User::factory()
            ->count(10)
            ->create();

        Verification::factory()
            ->count(50)
            ->create();

        for ($i = 0; $i < 50; $i++) {
            Customer::factory()
                ->create();
        }

        Notification::factory()
            ->count(50)
            ->create();

        Gift::factory()
            ->count(50)
            ->create();

        Product::factory()
            ->count(100)
            ->has(Variant::factory()->count(3))
            ->create();

        $products = Product::with('variants')->get();
        foreach ($products as $product) {
            $product->price = $product->variants->min('price');
            $product->update();
        }

        Review::factory()
            ->count(50)
            ->create();

        Order::factory()
            ->count(50)
            ->create();
    }
}
