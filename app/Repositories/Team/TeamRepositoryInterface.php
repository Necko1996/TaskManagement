<?php

namespace App\Repositories\Team;

interface TeamRepositoryInterface
{
    /**
     * Get all Teams by Auth user.
     *
     * @return mixed
     */
    public function get();
}
