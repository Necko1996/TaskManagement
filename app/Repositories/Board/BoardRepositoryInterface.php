<?php

namespace App\Repositories\Board;

use App\Board;

interface BoardRepositoryInterface
{
    /**
     * Get all boards by team.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function get();

    /**
     * Create new Board with card template.
     *
     * @param array $array
     * @return void
     */
    public function create(array $array);

    /**
     * Get board with related cards who have related tasks.
     *
     * @param \App\Board $board
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll(Board $board);
}
