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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();

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
