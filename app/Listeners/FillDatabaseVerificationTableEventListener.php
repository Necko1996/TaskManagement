<?php

namespace App\Listeners;

use Ramsey\Uuid\Uuid;
use App\UserVerification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class FillDatabaseVerificationTableEventListener implements ShouldQueue
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
        UserVerification::create([
            'email' => $event->user->email,
            'token' => Uuid::uuid4()->toString(),
        ]);
    }
}
