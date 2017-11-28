<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnimalType extends Model
{
    //
    public function animals()
    {
        return $this
            ->hasMany('App\Animal');
    }
}
