<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OutletType extends Model
{

    public function trainings()
    {
        return $this->belongsTo('App\Training');
        //return $this->belongsTo(Training::class); check if working
    }

    public function outlets()
    {
        return $this->hasMany('App\Outlet');
    }
}
