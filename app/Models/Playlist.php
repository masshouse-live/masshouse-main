<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        "spotify_link",
        "youtube_link",
        "souncloud_link",
        "applemusic_link",
        "image",
        "audio",
        "artist",
        "event"
    ];
}
