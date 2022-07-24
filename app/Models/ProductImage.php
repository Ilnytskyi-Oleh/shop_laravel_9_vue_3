<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = ['file_path', 'product_id'];

    public function getImageUrlAttribute()
    {
        if(Str::contains($this->preview_image, 'https://')) {
            return $this->file_path;
        }
        return url('storage/'.$this->file_path);
    }
}
