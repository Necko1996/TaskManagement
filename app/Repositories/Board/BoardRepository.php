<?php

namespace App\Repositories\Board;

use App\Card;
use App\Board;
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

        $this->createBase($board);
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

    /**
     * Create basic cards template.
     *
     * @param \App\Board $board
     * @return void
     */
    public function createBase(Board $board)
    {
        $board->cards()->saveMany([
            new Card(['name' => 'To Do', 'status' => 0]),
            new Card(['name' => 'In Progress', 'status' => 1]),
            new Card(['name' => 'Done', 'status' => 2]),
        ]);
    }
}
