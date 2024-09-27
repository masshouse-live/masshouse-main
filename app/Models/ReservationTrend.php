<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationTrend extends Model
{
    use HasFactory;

    protected $table = 'reservation_trend';

    protected $fillable = [
        'date',
        'hour',
        'count',
        'paid_reservation',
        'amount',
    ];
}
