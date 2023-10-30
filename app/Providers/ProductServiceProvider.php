<?php

namespace App\Providers;

use App\Services\Product\ProductService;
use App\Services\Product\ProductServiceContract;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(ProductServiceContract::class, ProductService::class);
    }

    public function provides()
    {
        return [
            ProductServiceContract::class
        ];
    }
}
