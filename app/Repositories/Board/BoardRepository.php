<?php

namespace App\Repositories\Board;

use App\Card;
use App\Board;
use App\Events\BoardCreateEvent;
use App\Repositories\Repository;

class BoardRepository extends Repository implements BoardRepositoryInterface
{
    /**
     * Get all boards.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function get()
    {
        return Board::forAuthUser()->get();
    }

    /**
     * Create new Board with card template.
     *
     * @param array $array
     * @return void
     */
    public function create(array $array)
    {
        $board = Board::create($array);

        event(new BoardCreateEvent($board));
    }

    /**
     * Get board with related cards who have related tasks.
     *
     * @param \App\Board $board
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(Board $board)
    {
        return Board::with('Cards.Tasks')->find($board->id);
    }
}
