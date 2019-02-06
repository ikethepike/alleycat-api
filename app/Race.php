<?php

namespace AlleyCat;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    /**
     * Fillable columns.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Properties to lazy load.
     *
     * @var array
     */
    protected $with = ['checkpoints'];

    /* Race relations */

    /**
     * Return user relation.
     *
     * @return AlleyCat\User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Return all attached competitors.
     *
     * @return AlleyCat\Competitor
     */
    public function competitors()
    {
        return $this->hasMany(Competitor::class);
    }

    /**
     * Return all stats attached to race.
     *
     * @return AlleyCat\Stat
     */
    public function stats()
    {
        return $this->hasMany(Stat::class);
    }

    /**
     * Return the checkpoints associated with the race.
     *
     * @return Alleycat\Checkpoint
     */
    public function checkpoints()
    {
        return $this->hasMany(Checkpoint::class);
    }
}
