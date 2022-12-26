<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'status',
        'priority',
        'board_id',
        'card_id',
    ];

    /**
     * Scope a query for auth user.
     *
     * @param $query
     * @return mixed
     */
    public function scopeForAuthUser($query)
    {
        return $query->where('user_id', '=', auth()->id());
    }

    /**
     * Scope a query to order by status.
     *
     * @param $query
     * @return mixed
     */
    public function scopeSortedPriority($query)
    {
        return $query->orderBy('priority', 'desc');
    }
}
