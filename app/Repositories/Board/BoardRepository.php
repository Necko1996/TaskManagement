<?php

namespace App\Repositories\Board;

use App\Events\BoardCreateEvent;
use App\Models\Board;
use App\Models\Team;
use App\Repositories\Repository;

class BoardRepository extends Repository implements BoardRepositoryInterface
{
    /**
     * Get all boards by team.
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function get()
    {
        return Team::with('Boards')->whereHas('Users', function ($query) {
            $query->where('id', auth()->id());
        })->get();
    }

    /**
     * Create new Board with card template.
     *
     * @param  array  $array
     */
    public function create(array $array)
    {
        $board = Board::create($array);

        event(new BoardCreateEvent($board));
    }

    /**
     * Get board with related cards who have related tasks.
     *
     * @param  Board  $board
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function getAll(Board $board)
    {
        return Board::with('Cards.Tasks')->find($board->id);
    }
}
