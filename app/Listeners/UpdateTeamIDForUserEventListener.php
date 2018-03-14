<?php

namespace App\Listeners;

use App\User;
use App\Events\AssignUserToTeamEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateTeamIDForUserEventListener
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
        $user = User::find(auth()->id());

        $user->update([
            'team_id' => $event->team->id,
        ]);
    }
}
