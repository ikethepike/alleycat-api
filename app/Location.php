<?php

namespace AlleyCat;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    /**
     * Fillable properties.
     */
    protected $fillable = ['name', 'description', 'longitude', 'latitude'];

    /* Relations */

    /**
     * Return user relation.
     *
     * @return AlleyCat\User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
