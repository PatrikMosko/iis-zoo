<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;


class Animal extends Model
{
    use SearchableTrait;

    protected $fillable = [
        'outlets_id'
    ];

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'animals.name' => 10
        ]

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
