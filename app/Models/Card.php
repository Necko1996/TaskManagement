<?php

namespace App\Models;

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
     * @return mixed
     */
    public function tasks()
    {
        return $this->hasMany(Task::class)->sortedPriority();
    }

    /**
     * Scope a query to order by status.
     *
     * @param $query
     * @return mixed
     */
    public function scopeSortedStatus($query)
    {
        return $query->orderBy('status', 'asc');
    }
}
