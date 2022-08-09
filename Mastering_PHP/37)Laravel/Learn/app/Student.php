<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Student extends Model
{
    public function studentinfo()
    {
       return Student::get();
    }

    public function salary($x, $y)
    {
       return $x + $y;
    }

    public function mark($math, $physics, $english)
    {
       return $math + $physics + $english;
    }
}
