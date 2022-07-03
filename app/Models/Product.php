<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable =[
        'title',
        'description',
        'content',
        'preview_image',
        'price',
        'old_price',
        'count',
        'is_published',
        'user_id',
        'category_id',
    ];

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function colors(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Color::class);
    }

    public function getImageUrlAttribute()
    {
        return url('storage/'.$this->preview_image);
    }
}
