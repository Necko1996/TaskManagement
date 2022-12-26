<?php

namespace App\Repositories\Board;

use App\Models\Board;

interface BoardRepositoryInterface
{
    /**
     * Get all boards by team.
     *
     * @return mixed
     */
    public function get();

    /**
     * Create new Board with card template.
     *
     * @param array $array
     * @return mixed
     */
    public function create(array $array);

    /**
     * Get board with related cards who have related tasks.
     *
     * @param Board $board
     * @return mixed
     */
    public function getAll(Board $board);
}
