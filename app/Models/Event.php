<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    // include events_venues table foreign key
    protected $fillable = [
        "title",
        "subtitle",
        "banner",
        "tickets_link",
        "date_time",
        "tag",
    ];

    public function venue()
    {
        return $this->belongsTo(EventsVenue::class);
    }
}
