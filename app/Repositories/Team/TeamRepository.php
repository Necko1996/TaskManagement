<?php

namespace App\Repositories\Team;

use App\Repositories\Repository;
use App\Models\Team;

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
