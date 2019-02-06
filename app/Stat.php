<?php

namespace AlleyCat;

use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    /**
     * Fillable columns.
     *
     * @var array
     */
    protected $fillable = ['key', 'value', 'race_id', 'competitor_id'];

    /**
     * Return competitor relation.
     *
     * @return AlleyCat\Competitor
     */
    public function competitor()
    {
        return $this->belongsTo(Competitor::class);
    }

    /**
     * Return race relation.
     *
     * @return AlleyCat\Race
     */
    public function race()
    {
        return $this->belongsTo(Race::class);
    }
}
