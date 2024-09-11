<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'merchandise_id',
        'order_id',
        'quantity',
        'price',
        'color',
        'size'
    ];

    public function merchandise()
    {
        return $this->belongsTo(Merchandise::class);
    }
}
