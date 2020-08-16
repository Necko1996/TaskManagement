<?php

namespace App\Listeners;

use App\Card;
use App\Events\BoardCreateEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CardsCreateEventListener implements ShouldQueue
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
     * @param  BoardCreateEvent  $event
     * @return void
     */
    public function handle(BoardCreateEvent $event)
    {
        $event->board->cards()->saveMany([
            new Card(['name' => 'To Do', 'status' => 0]),
            new Card(['name' => 'In Progress', 'status' => 1]),
            new Card(['name' => 'Done', 'status' => 2]),
        ]);
    }
}
