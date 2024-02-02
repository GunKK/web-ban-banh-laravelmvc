<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use App\Observers\ProductObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        View::composer(['customers.layouts.navbar', 'customers.layouts.sidebar'], function($view) {
            $categories = Category::select('id', 'name')->get();
            return $view->with('categories', $categories);
        });

        Product::observe(ProductObserver::class);
    }
}
