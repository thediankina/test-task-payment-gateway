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
        $timestamp = now()->timestamp;
        $amount = fake()->randomNumber();
        $amount_paid = fake()->numberBetween(0, $amount);
        $statuses = config('constants.payment_statuses');

        if ($amount_paid < $amount) {
            unset($statuses[array_search('completed', $statuses)]);
        }

        return [
            'merchant_id' => array_rand(array_flip(config('constants.merchant_ids'))),
            'status' => array_rand(array_flip($statuses)),
            'amount' => $amount,
            'amount_paid' => $amount_paid,
            'timestamp' => $timestamp,
        ];
    }
}
