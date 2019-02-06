<?php

namespace AlleyCat;

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
        'email', 'password', 'first_name', 'last_name',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Added attributes.
     *
     * @var array
     */
    protected $appends = ['name'];

    /* Relations */

    /**
     * Returns all races created by user.
     *
     * @return AlleyCat\Race
     */
    public function races()
    {
        return $this->hasMany(Race::class);
    }

    /* Appended Attributes */

    /**
     * Returns the full user name.
     *
     * @return string
     */
    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
