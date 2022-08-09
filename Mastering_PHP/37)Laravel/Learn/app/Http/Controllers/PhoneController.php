<?php

namespace App\Http\Controllers;

use App\Phone;


use Illuminate\Http\Request;

class PhoneController extends Controller
{
    function phoneInfo()
    {
        return Phone::with('user')->get();

    }
}
