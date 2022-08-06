<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * @inheritdoc
     */
    protected $table = 'payments';

    /**
     * @inheritdoc
     */
    public $timestamps = false;

    /**
     * @inheritdoc
     */
    protected $fillable = [
        'status',
        'amount',
        'amount_paid',
        'timestamp',
        'signature_1',
        'signature_2',
    ];
}
