<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name',
    ];

    /**
     * Get all boards.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function get()
    {
        return static::forAuthUser()->get();
    }

    /**
     * Get all cards.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getCards($boardId)
    {
        return static::get()->find($boardId)->cards;
    }

    public static function getTask($boardId, $cardId)
    {
        return static::get()->find($boardId)->tasks->where('card_id', '=', $cardId);
    }

    /**
     * Get all cards sorted.
     *
     * @return  \App\User|\Illuminate\Database\Eloquent\Relations\Relation
     */
    public function cards()
    {
        return $this->hasMany(Card::class)->sortedStatus();
    }

    /**
     * Get all cards sorted.
     *
     * @return  \App\User|\Illuminate\Database\Eloquent\Relations\Relation
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
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
}
