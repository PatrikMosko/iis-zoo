<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{

    public function animals()
    {
        return $this->hasMany('App\Animal');
    }

    public function cleanings()
    {
        return $this->hasMany('App\Cleaning');
    }

    public function outlet_types()
    {
        return $this->belongsTo('App\OutletType', 'outlet_type_id');
    }
}
