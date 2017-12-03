<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OutletType extends Model
{

    public function outlets()
    {
        return $this->hasMany('App\Outlet');
    }

    public function trainings()
    {
        return $this
            ->hasMany('App\Training');
    }
}
