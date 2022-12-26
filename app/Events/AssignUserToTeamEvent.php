<?php

namespace App\Events;

use App\Models\Team;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AssignUserToTeamEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $team;

    /**
     * @param Team $team
     */
    public function __construct(Team $team)
    {
        $this->team = $team;
    }
}
