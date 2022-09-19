<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'merchant_id',
        'amount',
        'amount_paid',
        'status',
        'timestamp',
    ];

    protected $timestamps = false;
}
