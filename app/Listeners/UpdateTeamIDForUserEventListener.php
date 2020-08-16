<?php

namespace App\Listeners;

use App\Events\AssignUserToTeamEvent;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateTeamIDForUserEventListener implements ShouldQueue
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
     * @param  AssignUserToTeamEvent  $event
     * @return void
     */
    public function handle(AssignUserToTeamEvent $event)
    {
        $event->team->users()->attach(auth()->id());
    }
}
