<?php

namespace App\Providers;

use App\Services\Product\ProductService;
use App\Services\Product\ProductServiceContract;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(ProductServiceContract::class, ProductService::class);
    }
}
