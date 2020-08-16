<?php

namespace App\Repositories\Team;

use App\Repositories\Repository;
use App\Team;

class TeamRepository extends Repository implements TeamRepositoryInterface
{
    public function get()
    {
        return Team::whereHas('Users', function ($query) {
            $query->where('id', auth()->id());
        })->get();
    }
}
