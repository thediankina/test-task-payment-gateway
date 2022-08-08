<?php

namespace App\Observers\Alpha;

use App\Models\Alpha\Payment;

class Gateway
{
    /**
     * @var bool
     */
    public bool $afterCommit = true;

    /**
     * @param Payment $payment
     * @return bool
     */
    public function updated(Payment $payment): bool
    {
        Payment::$response = [
            'merchant_id' => $payment->merchant_id,
            'payment_id' => $payment->id,
            'status' => $payment->status,
            'amount' => $payment->amount,
            'amount_paid' => $payment->amount_paid,
            'timestamp' => $payment->timestamp,
            'sign' => $payment->signature,
        ];

        return true;
    }
}
