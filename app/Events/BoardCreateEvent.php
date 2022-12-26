<?php

namespace App\Events;

use App\Models\Board;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BoardCreateEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $board;

    /**
     * @param  Board  $board
     */
    public function __construct(Board $board)
    {
        $this->board = $board;
    }
}
