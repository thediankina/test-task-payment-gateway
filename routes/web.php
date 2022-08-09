<?php

use App\Models\Payment;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::post('/', function ($data) {
    echo $data;
});

Route::get('gateway/alpha/{id}', function ($id) {
    Payment::query()->find($id)->update(['status' => 'expired']);
});
