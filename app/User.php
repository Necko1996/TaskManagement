<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get all tasks.
     *
     * @return  \App\User|\Illuminate\Database\Eloquent\Relations\Relation
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /**
     * Get logged user.
     *
     * @return  \App\User
     */
    public static function loggedUser()
    {
        return static::find(auth()->id());
    }
}
