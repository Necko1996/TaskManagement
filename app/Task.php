<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'status', 'user_id', 'priority', 'board_id', 'card_id'
    ];

    /**
     * Get all tasks.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function get()
    {
        return static::forAuthUser()->sortedStatus()->get();
    }

    /**
     * Scope a query for auth user.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeForAuthUser($query)
    {
        return $query->where('user_id', '=', auth()->id());
    }

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
