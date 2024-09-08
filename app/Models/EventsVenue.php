<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventsVenue extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cover_photo',
        'address',
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function images()
    {
        return $this->hasMany(EventVenueImage::class);
    }
}
