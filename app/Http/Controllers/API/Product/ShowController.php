<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\IndexProductResource;
use App\Http\Resources\Product\ProductImageResource;
use App\Models\Product;

class ShowController extends Controller
{
    public function __invoke(Product $product)
    {
        return new IndexProductResource($product);
    }
}
