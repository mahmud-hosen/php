<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Response;

use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;

use Illuminate\Support\Facades\Redis;

use Illuminate\Http\Request;

use App\Student;
use App\User;


class StudentController extends Controller
{
    function contact()
    {
        return view('contact');
    }
    function cacheInfo()
    {
      //  $user_details =  DB::table('user_details')->get();
      //  Cache::put('user_details', $user_details, 1000);
       return Cache::get('user_details');
    }
    function cookieInfo()
    {
      $cookie = Cookie::make('name', 'Mahmud Hosen');
       return Request::cookie('name');

      //  $response = new \Illuminate\Http\Response(view('welcome'));
      //   $response->withCookie(cookie('test_cookie', $request->test_cookie, 45000));
      //   return $response;
    }
    function sessionInfo(Request $request)
    {
      // $sessionInfo =  DB::table('users')->get();
      // return $request->session()->put('sessionInfo', $sessionInfo);
      // return $request->session()->get('sessionInfo');
      return $request->session()->all();

    }

    
    
    
    function info()
    {
        return view('info');
    }

    function allStudent()
    {
      $users =  DB::table('user_details')->paginate(5);
      // $users = User::paginate(5);
      return view('user',['users'=> $users]);
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
