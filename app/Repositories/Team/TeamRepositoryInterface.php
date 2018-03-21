<?php

namespace App\Repositories\Team;

interface TeamRepositoryInterface
{
    /**
     * Get all Teams by Auth user.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function get();
}
