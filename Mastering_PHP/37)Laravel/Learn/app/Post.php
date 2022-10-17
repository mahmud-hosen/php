<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // One to Many relationship
    public function comment()
    {
        return $this->hasMany('App\Comment');

    }
}
