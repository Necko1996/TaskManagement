<?php

namespace App\Repositories\Team;

use App\Models\Team;
use App\Repositories\Repository;

class TeamRepository extends Repository implements TeamRepositoryInterface
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function get()
    {
        return Team::whereHas('Users', function ($query) {
            $query->where('id', auth()->id());
        })->get();
    }
}
