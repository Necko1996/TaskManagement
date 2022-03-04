<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'board_id',
        'name',
        'status',
    ];

    /**
     * Get all tasks sorted.
     *
     * @return \App\User|\Illuminate\Database\Eloquent\Relations\Relation
     */
    public function tasks()
    {
        return $this->hasMany(Task::class)->sortedPriority();
    }

    /**
     * Scope a query to order by status.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSortedStatus($query)
    {
        return $query->orderBy('status', 'asc');
    }
}
