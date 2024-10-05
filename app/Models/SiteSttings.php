<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSttings extends Model
{
    use HasFactory;

    // table name
    protected $table = "site_settings";

    protected $fillable = [
        "name",
        "logo",
        "contact_email",
        "contact_phone",
        "contact_address",
        "menu_path",
        "reservation_from",
        "reservation_to",
        "facebook",
        "twitter",
        "youtube",
        "instagram",
        "snapchat",
        "tiktok",
        "threads",
    ];
}
