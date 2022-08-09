<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

use Illuminate\Http\Request;

use App\Student;

class StudentController extends Controller
{
    function contact()
    {
        return view('contact');
    }
    function info()
    {
        return view('info');
    }

    function allStudent()
    {
      return  $allStudent =  DB::table('student')->get();
    }

     function showStudent()
    {
      return  $allStudent =  Student::find(1);
    }
    
     function test()
    {

      $student = new Student();

      echo $student->studentinfo();

      echo $student->salary(4,5);
      echo "\n";

      echo $student->mark(40, 50, 60);
      echo $student->name;

    }

    function redisTest()
    {
      // Redis::set('name', 'Taylor');
      
    }

    function cacheTest()
    {
       $blog =  DB::table('students')->get();
      Redis::set('blog', $blog);
      return $value = Redis::get('blog');

 

    }
}
