<?php

namespace App\Models\Beta;

use Illuminate\Database\Eloquent\Casts\Attribute;

class Payment extends \App\Models\Payment
{
    /**
     * @var string
     */
    protected string $merchant_key = 'rTaasVHeteGbhwBx';

    /**
     * @var array
     */
    public static array $response;

    /**
     * @return Attribute
     */
    protected function Signature(): Attribute
    {
        return Attribute::make(
            get: function () {
                $attributes = $this->attributesToArray();
                $string = implode(".", $attributes) . $this->merchant_key;
                return hash('md5', $string);
            },
        );
    }
}
