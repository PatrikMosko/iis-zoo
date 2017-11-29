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
}
