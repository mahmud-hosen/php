<?php

namespace LP\Calculator;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalculatorController extends Controller
{
    public function message()
    {
        echo "Hi, Mahmud...";
    }

    public function sum($a, $b)
    {
        $result = $a + $b;
        return view('calculator::add',compact('result'));
    }
    
    public function sub($a, $b)
    {
        $result = $a - $b;
        return view('calculator::add',compact('result'));

    }

    public function mul($a, $b)
    {
        $result = $a * $b;
        return view('calculator::add',compact('result'));

    }

    public function div($a, $b)
    {
        $result = $a / $b;
        return view('calculator::add',compact('result'));

    }
}
