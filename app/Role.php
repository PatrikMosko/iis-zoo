<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // create relationship many to many between User and Role
    public function users()
    {
        return $this
            ->belongsToMany('App\User')
            ->withTimestamps();
    }
}
