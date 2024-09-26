<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableReservation extends Model
{
    use HasFactory;

    protected $fillable = [
        "customer_name",
        "customer_email",
        "customer_phone",
        "customer_address",
        "from_date",
        "to_date",
        "table_id",
        "status",
    ];
}
