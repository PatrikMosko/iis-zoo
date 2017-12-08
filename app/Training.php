<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    /**
     * Get all of the owning trainingable models.
     */
    public function trainingable()
    {
        return $this->morphTo();
    }

    public function outlet_types()
    {
        return $this->belongsTo('App\OutletType', 'outlet_type_id');
    }

    public function animal_types()
    {
        return $this->belongsTo('\App\AnimalType', 'animal_type_id');
    }

    public function users()
    {
        return $this
            ->belongsToMany('App\User')
            ->withTimestamps();
    }
}
