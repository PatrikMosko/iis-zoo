<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingInternal extends Model
{
    /**
     * Get all of the Internal trainings.
     */
    public function trainings()
    {
        return $this->morphMany('App\Training', 'trainingable');
    }
}
