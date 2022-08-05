<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Генерация тестовых пользователей
     *
     * @return void
     */
    public function run(): void
    {
        User::factory(10)->create();
    }
}
