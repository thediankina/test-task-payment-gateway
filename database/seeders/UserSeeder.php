<?php

namespace Database\Seeders;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Генерация тестовых пользователейи платежей
     *
     * @return void
     */
    public function run(): void
    {
        User::factory(10)
            ->has(Payment::factory(1))
            ->create();
    }
}
