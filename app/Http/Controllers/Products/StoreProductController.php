<?php

namespace App\Http\Controllers\Products;

use App\Exceptions\ProductCannotBeSaved;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Services\Product\ProductServiceContract;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StoreProductController extends Controller
{
    public function __construct(
        protected ProductServiceContract $productService
    )
    {
        //
    }

    public function __invoke(StoreProductRequest $request)
    {

        try {
            $requestData = $request->validated();

            $product = $this->productService->storeProduct($requestData);

            return response()->json($product);
        }catch (ProductCannotBeSaved $exception) {
            Log::error('product cannot be saved', [
                'exception' => $exception,
                'code' => 'store_product_cannot_saved'
            ]);

            return response()->json(['msg' => 'Unexpected error in product']);
        } catch (Exception $exception) {
            Log::error('Unexpected error in product', [
                'exception' => $exception,
                'code' => 'store_product_unexpected_error'
            ]);

            return response()->json(['msg' => 'Unexpected error in product']);
        }
    }
}
