<?php

namespace AlleyCat;

use Illuminate\Database\Eloquent\Model;

class Competitor extends Model
{
    /**
     * Fillable.
     *
     * @var array
     */
    protected $fillable = ['race_id', 'user_id'];

    /* Relations */

    public function stats()
    {
        return $this->hasMany(Stat::class);
    }
}
