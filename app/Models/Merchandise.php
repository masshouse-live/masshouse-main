<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchandise extends Model
{
    use HasFactory;


    protected $fillable = [
        "name",
        "description",
        "image",
        "price",
        "stock",
        "product_category_id",
        "colors",
        "sizes",
        "gender",
    ];

    // product images
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }


    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }
}
