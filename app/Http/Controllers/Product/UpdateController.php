<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();

        if($request->hasFile('preview_image')){
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            if(Storage::exists(storage_path('app/public/'. $product->preview_image))){
                unlink(storage_path('app/public/'. $product->preview_image));
            }
        }

        $tagsIds = $data['tags'];
        $colorsIds = $data['colors'];
        unset($data['tags'], $data['colors']);

        $product->update($data);

        $product->tags()->sync($tagsIds);
        $product->colors()->sync($colorsIds);

        $product->refresh();

        return redirect()->route('product.show', compact('product'));
    }
}
