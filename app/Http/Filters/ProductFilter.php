<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{

    const CATEGORIES = 'categories';
    const COLORS = 'colors';
    const TAGS = 'tags';
    const PRICE = 'price';
    const ORDER_BY = 'orderBy';

    protected function getCallbacks(): array
    {
        return [
            self::CATEGORIES => [$this, 'categories'],
            self::COLORS => [$this, 'colors'],
            self::TAGS => [$this, 'tags'],
            self::PRICE => [$this, 'price'],
            self::ORDER_BY => [$this, 'orderBy'],

        ];
    }

    public function categories(Builder $builder, $value)
    {
        $builder->whereIn('category_id', $value);
    }

    public function colors(Builder $builder, $value)
    {
        $builder->whereHas('colors', function ($b) use ($value){
            $b->whereIn('color_id', $value);
        });
    }

    public function tags(Builder $builder, $value)
    {
        $builder->whereHas('tags', function ($b) use ($value){
            $b->whereIn('tag_id', $value);
        });
    }

    public function price(Builder $builder, $value)
    {
        $builder->whereBetween('price', $value);
    }

    public function orderBy(Builder $builder, $value)
    {
        foreach ($value as $col => $val){
            $builder->orderBy($col, $val);
        }
    }
}
