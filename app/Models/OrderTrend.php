<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTrend extends Model
{
    use HasFactory;

    protected $table = 'order_trend';
    protected $fillable = [
        'date',
        'total_orders',
        'total_revenue',
    ];
}
