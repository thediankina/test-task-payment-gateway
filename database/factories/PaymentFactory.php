<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * @inheritdoc
     */
    public function definition(): array
    {
        $amount = fake()->randomNumber();
        $amount_paid = fake()->numberBetween(0, $amount);
        $timestamp = now()->timestamp;

        return [
            'merchant_id' => 6,
            'status' => 'new',
            'amount' => $amount,
            'amount_paid' => $amount_paid,
            'timestamp' => $timestamp,
        ];
    }
}
