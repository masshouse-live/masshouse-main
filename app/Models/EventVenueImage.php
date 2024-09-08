<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventVenueImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'alt',
        'image',
        'index',
    ];
}
