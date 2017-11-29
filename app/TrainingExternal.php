<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingExternal extends Model
{
    /**
     * Get all of the External trainings.
     */
    public function trainings()
    {
        return $this->morphMany('App\Training', 'trainingable');
    }
}
