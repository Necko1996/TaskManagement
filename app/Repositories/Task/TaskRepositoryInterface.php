<?php

namespace App\Repositories\Task;

interface TaskRepositoryInterface
{
    public function getCards(int $board_id);
}
