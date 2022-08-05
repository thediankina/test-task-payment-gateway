<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    /**
     * @inheritdoc
     */
    public function register(): void
    {
        Sanctum::ignoreMigrations();
    }

    /**
     * Загрузка служб других приложений
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
