<?php

namespace App\Providers;

use App\Repositories\Product\ProductRepositoryContract;
use App\Repositories\Product\ProductRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class ProductRepositoryProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(ProductRepositoryContract::class, ProductRepositoryEloquent::class);
    }

    public function provides()
    {
        return [
            ProductRepositoryContract::class,
        ];
    }
}
