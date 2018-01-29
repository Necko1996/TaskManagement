<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [
        'board_id', 'name', 'status',
    ];

    /**
     * Scope a query to order by status.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSortedStatus($query)
    {
        return $query->orderBy('status', 'asc');
    }
}
