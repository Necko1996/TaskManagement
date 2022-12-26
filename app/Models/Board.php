<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'team_id',
        'name',
    ];

    /**
     * Get all cards sorted.
     *
     * @return mixed
     */
    public function cards()
    {
        return $this->hasMany(Card::class)->sortedStatus();
    }

    /**
     * Get all cards sorted.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

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
}
