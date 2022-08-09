<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Запуск миграции
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table)
        {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->integer('merchant_id');
            $table->enum('status', config('constants.payment_statuses'));
            $table->integer('amount');
            $table->integer('amount_paid');
            $table->integer('timestamp');

            $table->comment('Таблица платежей');
        });
    }

    /**
     * Откат миграции
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
