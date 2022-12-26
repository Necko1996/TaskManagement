<?php

namespace App\Repositories\Task;

use App\Models\Board;
use App\Repositories\Repository;

class TaskRepository extends Repository implements TaskRepositoryInterface
{
    /**
     * @param int $board_id
     * @return mixed
     */
    public function getCards(int $board_id)
    {
        return Board::forAuthUser()->find($board_id)->cards;
    }
}
