<?php

namespace App\Events;

use App\Board;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class BoardCreateEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $board;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Board $board)
    {
        $this->board = $board;
    }
}
