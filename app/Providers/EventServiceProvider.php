<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\BoardCreateEvent' => [
            'App\Listeners\CardsCreateEventListener',
        ],

        'Illuminate\Auth\Events\Registered' => [
            'App\Listeners\FillDatabaseVerificationTableEventListener',
            'App\Listeners\SendVerificationMailEventListener',
        ],

        'App\Events\AssignUserToTeamEvent' => [
            'App\Listeners\UpdateTeamIDForUserEventListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
