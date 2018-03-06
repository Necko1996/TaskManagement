<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserConfirmation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'token',
        'verified',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'token',
    ];

    // TODO: Using Token
    public function getRouteKeyName()
    {
        return 'email';
    }
}
