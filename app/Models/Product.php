<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable =[
        'title', 'description','content','preview_image','price','count','is_published',
        'user_id', 'category_id'
    ];


}
