<?php

namespace App\Repositories\Task;

use App\Board;
use App\Repositories\Repository;

class TaskRepository extends Repository implements TaskRepositoryInterface
{
    public function getCards(int $board_id)
    {
        return Board::forAuthUser()->find($board_id)->cards;
    }
}
