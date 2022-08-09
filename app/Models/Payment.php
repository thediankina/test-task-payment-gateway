<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property int $merchant_id
 * @property string $status
 * @property int $amount
 * @property int $amount_paid
 * @property int $timestamp
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
    public $timestamps = false;

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
