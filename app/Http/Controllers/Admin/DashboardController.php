<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Gift;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use App\Models\Verification;

class DashboardController extends Controller
{
    public function index()
    {
        $objs = [
            [
                'name' => trans('app.orders'),
                'count' => Order::count(),
                'link' => route('admin.orders.index'),
            ],
            [
                'name' => trans('app.reviews'),
                'count' => Review::count(),
                'link' => route('admin.reviews.index'),
            ],
            [
                'name' => trans('app.customers'),
                'count' => Customer::count(),
                'link' => route('admin.customers.index'),
            ],
            [
                'name' => trans('app.verifications'),
                'count' => Verification::count(),
                'link' => route('admin.verifications.index'),
            ],
            [
                'name' => trans('app.notifications'),
                'count' => Notification::count(),
                'link' => route('admin.notifications.index'),
            ],
            [
                'name' => trans('app.gifts'),
                'count' => Gift::count(),
                'link' => route('admin.gifts.index'),
            ],
            [
                'name' => trans('app.products'),
                'count' => Product::count(),
                'link' => route('admin.products.index'),
            ],
            [
                'name' => trans('app.categories'),
                'count' => Category::count(),
                'link' => route('admin.categories.index'),
            ],
            [
                'name' => trans('app.users'),
                'count' => User::count(),
                'link' => route('admin.users.index'),
            ],
        ];

        return view('admin.dashboard.index')
            ->with([
                'objs' => $objs,
            ]);
    }
}
