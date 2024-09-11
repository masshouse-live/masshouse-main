<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'zip',
        'total',
        'status',
        'users_events'
    ];

    public function product_orders()
    {
        return $this->belongsToMany(ProductOrder::class);
    }
}
