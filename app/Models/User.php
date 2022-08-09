<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $card_type
 * @property string $card_number
 * @property string $card_expiration_date
 * @property int $card_code
 */
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
    protected $fillable = [
        'name',
        'email',
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
