<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\IndexProductResource;
use App\Http\Resources\Product\ProductImageResource;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Tag;

class FilterListController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $colors = Color::all();

        $maxPrice = Product::orderBy('price', 'DESC')->first()->price;
        $minPrice = Product::orderBy('price', 'ASC')->first()->price;

        $result = [
          'categories' => $categories,
          'tags' => $tags,
          'colors' => $colors,
          'price' => [
              'min' => $minPrice,
              'max' => $maxPrice
          ]
        ];

        return response()->json($result);
    }
}
