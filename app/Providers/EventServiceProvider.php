<?php

namespace App\Providers;

use App\Events\DeleteContact;
use App\Events\RestoreContact;
use App\Listeners\DeleteContactListener;
use App\Listeners\RestoreContactListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        DeleteContact::class => [
            DeleteContactListener::class 
        ],
        RestoreContact::class => [
            RestoreContactListener::class 
        ]
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
}
