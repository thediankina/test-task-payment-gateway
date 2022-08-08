<?php

namespace App\Observers\Beta;

use App\Models\Payment;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

class Gateway
{
    /**
     * @var bool
     */
    public bool $afterCommit = true;

    /**
     * @param Payment $payment
     * @return JsonResponse
     */
    public function updated(Payment $payment): JsonResponse
    {
        return Response::json(
            array_filter(
                $payment->toArray(),
                fn($key) => in_array($key, $payment->getVisible()),
                ARRAY_FILTER_USE_KEY
            )
        );
    }
}
