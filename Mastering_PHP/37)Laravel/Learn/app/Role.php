<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function employees()
    {
        return $this->belongsToMany('App\Employee');
    }
}
