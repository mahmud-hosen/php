<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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

Route::get('contact','StudentController@contact');
Route::get('info','StudentController@info');

Route::get('allStudent','StudentController@allStudent');
Route::get('showStudent','StudentController@showStudent');

Route::get('phoneInfo','PhoneController@phoneInfo');

Route::get('allPost','PostController@allPost');

Route::get('employeeRoles','EmployeeController@employeeRoles');
Route::get('rolesToEmployee','RoleController@rolesToEmployee');

Route::get('test','StudentController@test')->name('test');

Route::get('userInfoSave','UserController@userInfoSave');
Route::get('userInfoFind','UserController@userInfoFind');
Route::get('userInfoUpdate','UserController@userInfoUpdate');

Route::get('redisTest','StudentController@redisTest');

Route::get('cacheTest','StudentController@cacheTest');
Route::get('notificationMail','UserController@notificationMail');

Route::get('PostProcess','UserController@PostProcess');






























