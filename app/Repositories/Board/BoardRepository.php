<?php

namespace App\Repositories\Board;

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
}
