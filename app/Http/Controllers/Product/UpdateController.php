<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $tag)
    {
        $data = $request->validated();
        $tag->update($data);

        return redirect()->route('product.show', compact('product'));
    }
}
