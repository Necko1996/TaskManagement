<?php

namespace App\Listeners;

use App\User;
use App\Events\AssignUserToTeamEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
