<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsletterSubscription extends Model
{
    use HasFactory;

    // table
    protected $table = 'newslettet_list';

    protected $fillable = [
        'email',
        'subscribed',
    ];
}
