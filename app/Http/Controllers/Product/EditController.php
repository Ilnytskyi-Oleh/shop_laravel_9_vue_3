<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;

class EditController extends Controller
{
    public function __invoke(Product $tag)
    {
        return view('product.edit', compact('product'));
    }
}
