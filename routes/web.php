<?php

use App\Models\Alpha\Payment as AlphaPayment;
use App\Models\Beta\Payment as BetaPayment;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

Route::get('gateway/alpha/{id}', function ($id) {
    AlphaPayment::query()->find($id)->update(['status' => 'expired']);
    return Response::json(AlphaPayment::$response);
});

Route::get('gateway/beta/{id}', function ($id) {
    BetaPayment::query()->find($id)->update(['status' => 'expired']);
    return Response::json(BetaPayment::$response);
});
