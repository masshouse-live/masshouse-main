<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtistEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'artist_id',
        'event_id',
    ];

    public function artist()
    {
        return $this->belongsTo(Professional::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
