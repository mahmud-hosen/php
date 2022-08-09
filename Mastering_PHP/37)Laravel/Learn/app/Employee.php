<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
}
