<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

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
        'group_id',
    ];

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function group(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Group::class);
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
        if(Str::contains($this->preview_image, 'https://')) {
            return $this->preview_image;
        }
        return url('storage/'.$this->preview_image);
    }
}
