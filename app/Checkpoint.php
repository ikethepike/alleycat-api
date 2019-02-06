<?php

namespace AlleyCat;

use Illuminate\Database\Eloquent\Model;

class Checkpoint extends Model
{
    /**
     * Fillable properties.
     *
     * @var array
     */
    protected $fillable = ['longitude', 'latitude', 'name'];

    /**
     * Return the race relation.
     *
     * @return AlleyCat\Race
     */
    public function race()
    {
        return $this->belongsTo(Race::class);
    }
}
