<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    // Many to Many relationship
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
}
