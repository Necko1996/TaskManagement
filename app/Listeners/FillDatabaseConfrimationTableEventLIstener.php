<?php

namespace App\Listeners;

use App\UserConfirmation;
use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Ramsey\Uuid\Uuid;

class FillDatabaseConfrimationTableEventLIstener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        UserConfirmation::create([
            'email' => $event->user->email,
            // TODO: Using Token | make better token
            'token' => Uuid::uuid4()->toString(),
        ]);
    }
}
