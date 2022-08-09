<?php

namespace App\Observers\Beta;

use App\Models\Payment;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class Gateway
{
    /**
     * @var bool
     */
    public bool $afterCommit = true;

    /**
     * @var string
     */
    protected string $merchant_key = 'rTaasVHeteGbhwBx';

    /**
     * @param Payment $payment
     * @return PromiseInterface|Response
     */
    public function updated(Payment $payment): PromiseInterface|Response
    {
        $payment->amount *= 100;
        $payment->amount_paid *= 100;

        return Http::withHeaders(['Authorization' => $this->sign($payment)])
            ->asForm()
            ->post(config('constants.callback_url'),
                [
                    'project' => $payment->merchant_id,
                    'invoice' => $payment->id,
                    'status' => $payment->status,
                    'amount' => $payment->amount,
                    'amount_paid' => $payment->amount_paid,
                    'rand' => Str::random(10),
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
        $string = implode('.', $attributes) . $this->merchant_key;

        return hash('md5', $string);
    }
}
