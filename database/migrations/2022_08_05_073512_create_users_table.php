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
        Schema::create('users', function (Blueprint $table)
        {
            $table->id();
            $table->string('name', 100);
            $table->string('card_type', 20);
            $table->string('card_number', 20);
            $table->string('card_expiration_date', 5);

            $table->comment('Таблица пользователей');
        });
    }

    /**
     * Откат миграции
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
