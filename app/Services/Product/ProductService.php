<?php

namespace App\Services\Product;

use App\Exceptions\ProductCannotBeSaved;
use App\Repositories\Product\ProductRepositoryContract;
use Illuminate\Support\Facades\DB;

class ProductService implements ProductServiceContract
{
    public function __construct(
        protected ProductRepositoryContract $productRepository
    )
    {

    }
    public function storeProduct($attributes)
    {
        DB::beginTransaction();

        try {
            $product =  $this->productRepository->store($attributes);

            DB::commit();

            return $product;
        }catch (ProductCannotBeSaved $exception) {
            DB::rollBack();

            throw $exception;
        }
    }
}
