<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = [
        'outlets_id'
    ];

    public function feedings()
    {
        return $this
            ->belongsToMany('App\Feeding')
            -> withTimestamps();
    }

    public function outlet()
    {

        return $this->belongsTo('\App\Outlet', 'outlet_id');
    }

    public function animal_types()
    {
        return $this->belongsTo('\App\AnimalType', 'animal_types_id');
    }

}
