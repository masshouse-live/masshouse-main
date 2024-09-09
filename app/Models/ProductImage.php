<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'merchandise_id',
        'image',
    ];

    public function merchandise()
    {
        return $this->belongsTo(Merchandise::class);
    }
}
