<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    // table name
    protected $table = 'product_categories';

    protected $fillable = [
        'name',
        'image',
        'slug',
        'tags',
        'price_from',
    ];

    public function products()
    {
        return $this->hasMany(Merchandise::class);
    }
}
