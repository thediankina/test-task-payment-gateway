<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $merchant_id
 * @property string $status
 * @property int $amount
 * @property int $amount_paid
 * @property int $timestamp
 * @property string $signature
 */
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
    protected $attributes = [
        'id',
        'user_id',
        'merchant_id',
        'status',
        'amount',
        'amount_paid',
        'timestamp',
    ];

    /**
     * @inheritdoc
     */
    protected $fillable = [
        'user_id',
        'merchant_id',
        'status',
        'amount',
        'amount_paid',
        'timestamp',
    ];

    /**
     * @inheritdoc
     */
    protected $appends = [
        'signature',
    ];

    /**
     * @inheritdoc
     */
    protected $hidden = [
        'user_id',
    ];

    /**
     * @inheritdoc
     */
    public $timestamps = false;
}
