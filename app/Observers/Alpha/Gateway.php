<?php

namespace App\Observers\Alpha;

use App\Models\Payment;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class Gateway
{
    /**
     * @var bool
     */
    public bool $afterCommit = true;

    /**
     * @var string
     */
    private string $merchant_key = 'KaTf5tZYHx4v7pgZ';

    /**
     * @param Payment $payment
     * @return Response
     */
    public function updated(Payment $payment): Response
    {
        $payment->timestamp = now()->timestamp;
        $payment->save();

        $payment->amount *= 100;
        $payment->amount_paid *= 100;

        return Http::post(
            config('constants.callback_url'),
            [
                'merchant_id' => $payment->merchant_id,
                'payment_id' => $payment->id,
                'status' => $payment->status,
                'amount' => $payment->amount,
                'amount_paid' => $payment->amount_paid,
                'timestamp' => $payment->timestamp,
                'sign' => $this->sign($payment),
            ]
        );
    }

    /**
     * Сформировать подпись
     *
     * @param Payment $payment
     * @return string
     */
    private function sign(Payment $payment): string
    {
        $attributes = $payment->attributesToArray();
        $string = implode(':', $attributes) . $this->merchant_key;

        return hash('sha256', $string);
    }
}
