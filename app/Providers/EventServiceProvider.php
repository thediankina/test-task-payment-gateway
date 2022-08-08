<?php

namespace App\Providers;

use App\Models\Alpha\Payment as AlphaPayment;
use App\Models\Beta\Payment as BetaPayment;
use App\Observers\Alpha\Gateway as AlphaGateway;
use App\Observers\Beta\Gateway as BetaGateway;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * @inheritdoc
     */
    protected $observers = [

        AlphaPayment::class => [
            AlphaGateway::class,
        ],

        BetaPayment::class => [
            BetaGateway::class,
        ],
    ];

    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
