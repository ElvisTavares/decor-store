<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\BaseRepositoryEloquent;

class ProductRepositoryEloquent extends BaseRepositoryEloquent implements ProductRepositoryContract
{
  protected $model = Product::class;

}
