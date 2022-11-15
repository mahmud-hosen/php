<?php

namespace App\Http\Controllers;

use App\Phone;
use App\User;



use Illuminate\Http\Request;

class PhoneController extends Controller
{
    function phoneInfo()
    {
        return $info = Phone::with('user')->get();

    }
   
}
