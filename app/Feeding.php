<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feeding extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id'
    ];
    public function animals()
    {
        return $this
            ->belongsToMany('App\Animal')
            ->withTimestamps();
    }
    public function users()
    {
        return $this->belongsTo('\App\User', 'user_id');
    }
}
