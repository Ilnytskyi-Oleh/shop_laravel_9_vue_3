<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\IndexRequest;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(IndexRequest $request )
    {
        $data = $request->validated();

//        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);

        $tagsIds = $data['tags'];
        $colorsIds = $data['colors'];
        $productImages = $data['product_images'];

        unset($data['tags'], $data['colors'], $data['product_images']);

        $product = Product::firstOrCreate([
            'title' => $data['title']
        ], $data);

        $product->tags()->attach($tagsIds);
        $product->colors()->attach($colorsIds);

        foreach ($productImages as $productImage){
            ProductImage::create([
                'file_path' => Storage::disk('public')->put('/images', $productImage),
                'product_id' => $product->id,
            ]);
        }


        return redirect()->route('product.index');
    }
}
