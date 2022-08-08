<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    use HasFactory;

    /**
     * @inheritdoc
     */
    protected $table = 'users';

    /**
     * @inheritdoc
     */
    public $timestamps = false;

    /**
     * @inheritdoc
     */
    protected $attributes = [
        'id',
        'name',
        'email',
        'card_type',
        'card_number',
        'card_expiration_date',
        'card_code',
    ];

    /**
     * @inheritdoc
     */
    protected $fillable = [
        'name',
        'card_type',
        'card_number',
        'card_expiration_date',
        'card_code',
    ];

    /**
     * @return HasMany
     */
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }
}
