<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // Many to Many relationship
    public function employees()
    {
        return $this->belongsToMany('App\Employee');
    }
}
