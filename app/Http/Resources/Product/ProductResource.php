<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Category\ColorResource;
use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $products = Product::whereNot('group_id','=' ,null)
            ->where('group_id', $this->group_id)
            ->get();

        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'content' => $this->content,
            'price' => $this->price,
            'old_price' => $this?->old_price,
            'count' => $this->count,
            'is_published' => $this->is_published,
            'category' => new CategoryResource($this->category),
            'group_products' => ProductMinResource::collection($products),
            'images' => ProductImageResource::collection($this->productImages),
        ];
    }
}
