<?php

namespace App\Domains\Product\Providers;

use App\Domains\Product\Repositories\ProductRepository;
use App\Domains\Product\Services\ProductService;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ProductRepository::class,
            ProductService::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
