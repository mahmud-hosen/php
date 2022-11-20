<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = ['shop_owner','shop_name','shop_location','created_at','updated_at'];
    //
}
