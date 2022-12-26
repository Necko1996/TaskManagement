<?php

namespace App\Repositories\Task;

interface TaskRepositoryInterface
{
    /**
     * @param  int  $board_id
     * @return mixed
     */
    public function getCards(int $board_id);
}
