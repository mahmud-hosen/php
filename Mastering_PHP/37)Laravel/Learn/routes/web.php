<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/name', function () {
    return "Mahmud";
});


Route::post('/say', function(Request $request)
{
    $all = $request->all();
    var_dump($all);
    echo "Hi {$all['name']} {$all['age']}";

});


Route::get('/contact/{value}', function ($value) {
    return view('home',[
        'name' => $value,
        'age' => 30,

    ]);
});

 //____________________   Eloquent Relationship Routes _______________
   
    // ..................... One to one ............................
    Route::get('phoneInfo','PhoneController@phoneInfo');
    Route::get('userInfo','UserController@userInfo');

    //...................... One to many  .........................
    Route::get('allPost','PostController@allPost');
   
    //...................... Many to many .........................
    Route::get('employeeRoles','EmployeeController@employeeRoles');
    Route::get('rolesToEmployee','RoleController@rolesToEmployee');




Route::get('cacheInfo','StudentController@cacheInfo');
Route::get('cookieInfo','StudentController@cookieInfo');
Route::get('sessionInfo','StudentController@sessionInfo');





Route::get('contact','StudentController@contact');
Route::get('info','StudentController@info');

Route::get('allStudent','StudentController@allStudent');
Route::get('showStudent','StudentController@showStudent');



Route::get('test','StudentController@test')->name('test');

Route::get('userInfoSave','UserController@userInfoSave');
Route::get('userInfoFind','UserController@userInfoFind');
Route::get('userInfoUpdate','UserController@userInfoUpdate');

Route::get('redisTest','StudentController@redisTest');

Route::get('cacheTest','StudentController@cacheTest');
Route::get('notificationMail','UserController@notificationMail');

Route::get('PostProcess','UserController@PostProcess');






























