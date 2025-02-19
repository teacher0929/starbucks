<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Model::preventLazyLoading(!$this->app->isProduction());

        View::composer('client.app.nav', function ($view) {
            $categories = Category::whereNull('parent_id')
                ->with('children')
                ->orderBy('sort_order')
                ->get();

            $view->with([
                'categories' => $categories,
            ]);
        });
    }
}
