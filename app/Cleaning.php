<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cleaning extends Model
{
    public function outlets()
    {
        return $this->belongsTo('\App\Outlet', 'outlet_id');
    }

    public function users()
    {
        return $this
            ->belongsToMany('App\User')
            ->withTimestamps();
    }
}
